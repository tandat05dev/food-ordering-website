document.querySelector("form").addEventListener("submit", async function (e) {
  e.preventDefault();
  const formData = new FormData(this);

  const email = document.getElementById("formEmail").value;
  const password = document.getElementById("formPassword").value;
  const checkbox = document.getElementById("formCheckbox").checked;

  if (!email.includes("@gmail")) {
    alert("Email is not valid.");
    return;
  }

  if (password.length < 8) {
    alert("Password length must be at least 8 character.");
    return;
  }

  if (!checkbox) {
  } else {
  }

  try {
    const response = await fetch(
      "/food-ordering-website/app/controllers/sign_in_controller.php",
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
