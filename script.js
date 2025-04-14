// Shto këtë për të përdorur EmailJS
emailjs.init("user_yourUserID"); // Vendos User ID nga EmailJS dashboard

document.getElementById("contact-form").addEventListener("submit", function (e) {
  e.preventDefault();

  emailjs.sendForm("your_service_id", "your_template_id", this)
    .then(function () {
      alert("Mesazhi u dërgua me sukses!");
    }, function (error) {
      alert("Dështoi dërgimi: " + JSON.stringify(error));
    });

  this.reset(); // Pastro fushat pas dërgimit
});
