function displayImage() {
  var input = document.getElementById("image-input");
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("image").src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}
