import "./bootstrap";

(async () => {
    // Check for geolocation and set user's location
    if ("geolocation" in navigator) {
        // Check if the user location is set

        const position = await new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(resolve, reject);
        });

        const { latitude: userLatitude, longitude: userLongitude } =
            position.coords;

        const CSRF_TOKEN = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        fetch("/set-user-location", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": CSRF_TOKEN,
            },
            body: JSON.stringify({
                userLatitude,
                userLongitude,
            }),
        });
    }
})();
