function searchZipcode() {
  const zipcode = $('#zipcode').val();
  if (!zipcode) {
    window.alert('郵便番号を入力してください。');
    return;
  }
  $.ajax({
    url: `http://localhost:8080/zipcode/${zipcode}`,
    success: result => {
      $('#result').empty();
      const address = result.map(e => e.prefecture + e.city + e.town)[0];
      $('#result').append("入力された住所は <strong>" + address + "</strong> です。");
    }
  });
}
