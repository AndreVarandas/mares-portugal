import "./bootstrap";

const fetchUnsplashImage = async (portName) => {
    const ACCESS_KEY = process.env.ACCESS_KEY;
    try {
        const response = await fetch(
            `https://api.unsplash.com/search/photos?query=${portName}&client_id=ACCESS_KEY`
        );

        if (!response.ok) {
            throw new Error("Failed to fetch Unsplash images");
        }

        const data = await response.json();
        const photo = data.results[0];

        const imageUrl = photo.urls.regular;

        document.body.style.backgroundImage = `url(${imageUrl})`;
        document.body.style.backgroundSize = "cover";
        document.body.style.backgroundRepeat = "no-repeat";
        document.body.style.backgroundAttachment = "fixed";
    } catch (error) {
        console.error("Error fetching Unsplash images:", error);
    }
};

// Check for geolocation and set user's location
(async function () {
    if ("geolocation" in navigator) {
        // Check if the user location is set
        if (sessionStorage.getItem("userLocationSet") !== "true") {
            const permissionStatus = await navigator.permissions.query({
                name: "geolocation",
            });

            if (
                permissionStatus.state === "granted" ||
                permissionStatus.state === "prompt"
            ) {
                try {
                    const position = await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(
                            resolve,
                            reject
                        );
                    });

                    const { latitude: userLatitude, longitude: userLongitude } =
                        position.coords;

                    const setUserLocationResponse = await fetch(
                        "/set-user-location",
                        {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({
                                userLatitude,
                                userLongitude,
                            }),
                        }
                    );

                    // Set session storage to prevent asking for location again
                    sessionStorage.setItem("userLocationSet", "true");
                    // Fetch the Unsplash image with the user's location name
                    fetchUnsplashImage(
                        sessionStorage.getItem("closestPortName")
                    );
                } catch (error) {
                    console.error("Error setting user location:", error);
                }
            }
        }
    }
})();
