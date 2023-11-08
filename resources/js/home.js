// Function to handle dropdown change and redirect
const handlePortChange = (event) => {
    const selectedPort = event.target.value;
    window.location.href = `?port=${selectedPort}`;
};

// Event listener for dropdown change
const portDropdown = document.getElementById("portDropdown");
if (portDropdown) {
    portDropdown.addEventListener("change", handlePortChange);
}
