function searchZipcode() {
  const zipcode = $('#zipcode').val();
  if (!zipcode) {
    window.alert('郵便番号を入力してください。');
    return;
  }
  $.ajax({
    url: `http://localhost:8080/zipcode/${zipcode}`,
    success: function (result) {
      $('#result').empty();
      let res = '';
      result.forEach(e => {
        res += e.prefecture + e.city + e.town + '<br>';
      });
      $('#result').append(res);
    }
  })
}
