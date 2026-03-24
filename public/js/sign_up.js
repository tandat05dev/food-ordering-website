document.querySelector("form").addEventListener("submit", async function (e) {
  e.preventDefault();
  const formData = new FormData(this);

  try {
    const response = await fetch(
      "/food-ordering-website/app/controllers/sign_up_controller.php",
      {
        method: "POST",
        body: formData,
      },
    );

    const result = await response.json();

    if (result.success) {
      window.location.href = "/food-ordering-website/app/views/main.php";
    } else {
      alert(result.message);
    }
  } catch (error) {
    console.error("Error:", error);
    alert("Internal server error.");
  }
});
