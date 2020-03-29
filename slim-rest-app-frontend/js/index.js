function searchZipcode() {
  const zipcode = $('#zipcode').val();
  if (!zipcode) {
    window.alert('郵便番号を入力してください。');
    return;
  }
  $.ajax({
    url: `http://localhost:8080/zipcode/${zipcode}`,
    success: result => {
      $('#result').css('display', 'block');
      $('#address').empty();
      $('#address').append(result);
    }
  });
}
