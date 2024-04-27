$(document).ready(function () {
  var addedRow = false;
  $(".nav-link").click(function (e) {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

    var target = $(this).data("target"); // Lấy giá trị data-target
    $(".nav-link").removeClass("active"); // Xóa lớp active từ tất cả các nav-item
    $(this).addClass("active"); // Thêm lớp active cho nav-item được nhấp vào

    // Ẩn tất cả các tab-pane
    $(".tab-pane").hide();

    // Hiển thị tab-pane tương ứng với nav-item được nhấp vào
    $(target).show();
  });

  $('.edit-btn').click(function(){
    // Lấy dữ liệu từ các ô trong hàng
    var rowData = $(this).closest('tr').find('td');
    
    // Cho phép chỉnh sửa dữ liệu trong các ô
    rowData.attr('contenteditable', 'true');
    
    // Thay đổi nội dung của nút thành "Lưu"
    $(this).text('Lưu').removeClass('btn-primary').addClass('btn-success').off('click').click(function(){
      // Lấy dữ liệu mới từ các ô
      var updatedData = $(this).closest('tr').find('td');
      
      // Gửi dữ liệu cập nhật đến server hoặc xử lý theo nhu cầu của bạn
      
      // Chặn việc chỉnh sửa dữ liệu sau khi đã lưu
      updatedData.attr('contenteditable', 'false');
      
      // Thay đổi nội dung và lớp của nút thành "Sửa sản phẩm" sau khi đã lưu
      $(this).text('Sửa').removeClass('btn-success').addClass('btn-primary').off('click').click(function(){
        // Gọi lại hàm xử lý sự kiện khi nhấn nút "Sửa sản phẩm"
        // ở đây bạn có thể mở một cửa sổ modal hoặc điều hướng người dùng đến một trang khác để sửa sản phẩm
      });
    });
  });



  $(document).on('click', '.save-btn', function(){
    var rowData = $(this).closest('tr').find('td[contenteditable=true]'); // Lấy dữ liệu từ các ô trong hàng
    var isValid = true;
    rowData.each(function(){
      if ($(this).text().trim() === '') {
        isValid = false;
        return false; // Dừng vòng lặp nếu có ô trống
      }
    });
    if (isValid) {
      rowData.attr('contenteditable', 'false'); // Chặn chỉnh sửa dữ liệu sau khi lưu
      $(this).text('Sửa').removeClass('btn-success').addClass('btn-primary'); // Chuyển nút thành "Sửa"
    } else {
      alert('Vui lòng nhập đầy đủ thông tin sản phẩm');
    }
  });

  $('#add-product-btn').click(function(){
    
    if (!addedRow) {
      var newRow = $('<tr>').append(
        $('<td>').attr('contenteditable', 'true'),
        $('<td>').attr('contenteditable', 'true'),
        $('<td>').attr('contenteditable', 'true'),
        $('<td>').attr('contenteditable', 'true'),
        $('<td>').attr('contenteditable', 'true'),
        $('<td>').attr('contenteditable', 'true'),
        $('<td>').append(
          $('<button>').addClass('btn btn-primary save-btn').text('Lưu')
        )
      );
      $('tbody').append(newRow);
      addedRow = true; // Đánh dấu đã thêm hàng mới
    } else {
      alert('Chỉ được thêm một hàng mỗi lần.');
    }
  });


  function showProductImage(imageSrc) {
    var productOverlay = document.getElementById('productOverlay');
    var productImage = document.getElementById('productImage');
  
    productImage.src = imageSrc;
    productOverlay.style.display = 'flex'; // Hiển thị phần overlay
  }
  
  // Đóng phần hiển thị ảnh khi nhấp vào overlay
  document.getElementById('productOverlay').onclick = function(event) {
    if (event.target == this) {
      this.style.display = 'none'; // Ẩn phần overlay khi click bên ngoài ảnh
    }
  };
});
