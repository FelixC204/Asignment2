<script src="../../../assets/Admin/vendor/jquery/jquery.min.js"></script>
<script src="../../../assets/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../assets/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../assets/Admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../../assets/Admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../assets/Admin/js/demo/chart-area-demo.js"></script>
<script src="../../../assets/Admin/js/demo/chart-pie-demo.js"></script>

<!-- Summernote -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: 'Nhập nội dung bài viết',
      tabsize: 2,
      height: 480,
      backgroundColor: '#fff',
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
<script>
  $(document).ready(function() {
      $('.btn-toggle-password').on('click', function() {
          // Tìm span chứa mật khẩu
          var passwordDisplay = $(this).closest('tr').find('.password-display');

          // Lấy giá trị mật khẩu đã lưu trong data attribute
          var password = passwordDisplay.data('password');

          // Kiểm tra trạng thái hiện tại của mật khẩu
          if (passwordDisplay.text() === '****') {
              passwordDisplay.text(password);
          } else {
              // Nếu đang hiển thị, ẩn mật khẩu
              passwordDisplay.text('********');
          }
      });
  });
</script>

<script>
  function updateClock() {
      var now = new Date();
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var seconds = now.getSeconds();

      // Định dạng giờ, phút, giây để hiển thị luôn có 2 chữ số
      hours = hours < 10 ? '0' + hours : hours;
      minutes = minutes < 10 ? '0' + minutes : minutes;
      seconds = seconds < 10 ? '0' + seconds : seconds;

      var timeString = hours + ':' + minutes + ':' + seconds;

      document.getElementById('clock').textContent = timeString;
  }

  // Gọi hàm updateClock mỗi giây
  setInterval(updateClock, 1000);

  // Gọi hàm updateClock khi trang được load lần đầu
  updateClock();
</script>

@if (!empty($_SESSION['success']))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ $_SESSION['success'] }}',
            showConfirmButton: false,
            timer: 1500
        });
    });


    
</script>
@php
    $_SESSION['success'] = null;
@endphp
@endif



</body>

</html>
