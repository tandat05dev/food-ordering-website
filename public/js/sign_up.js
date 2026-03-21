document.querySelector("form").addEventListener("submit", async function (e) {
  e.preventDefault();

  const formData = new FormData(this);
  const full_name = document.getElementById("formFullName").value;
  const email = document.getElementById("formEmail").value;
  const password = document.getElementById("formPassword").value;
  const confirm_password = document.getElementById("formConfirmPassword").value;

  if (full_name.trim() === "") {
    alert("Your entered name is not valid.");
  }

  if (!email.includes("@gmail.com")) {
    alert("Email is not valid.");
    return;
  }

  if (password.length < 8) {
    alert("Password length must be at least 8 character.");
    return;
  }

  if (confirm_password !== password) {
    alert("Password and confirm password must be the same.");
    return;
  }

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
      window.location.href = "/food-ordering-website/app/views/sign_in.php";
    } else {
      alert(result.message);
    }
  } catch (error) {
    console.error("Error:", error);
    alert("Internal server error.");
  }
});
