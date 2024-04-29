function login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Perform authentication logic (you may replace this with your server-side logic)
  if (username === "demo" && password === "password") {
    alert("Login successful!");
    $("#loginModal").modal("hide"); // Hide the modal on successful login
  } else {
    alert("Invalid username or password. Please try again.");
  }
}

function register() {
  var newUsername = document.getElementById("newUsername").value;
  var newPassword = document.getElementById("newPassword").value;

  // Perform registration logic (you may replace this with your server-side logic)
  alert("Registration successful for " + newUsername + "!"); // Show a confirmation (you can replace this with a redirect or other action)
}

// slider

let currentIndex = 0;
const intervalTime = 3000; // 3 giây

function changeSlide(direction) {
  const slides = document.querySelector(".slider");
  const totalSlides = document.querySelectorAll(".slide").length;

  currentIndex += direction;

  if (currentIndex < 0) {
    currentIndex = totalSlides - 1;
  } else if (currentIndex >= totalSlides) {
    currentIndex = 0;
  }

  const translateValue = -currentIndex * 100 + "%";
  slides.style.transform = `translateX(${translateValue})`;
}

function nextSlide() {
  changeSlide(1);
}

function autoSlide() {
  setInterval(() => {
    nextSlide();
  }, intervalTime);
}

// Bắt đầu chuyển slide tự động
autoSlide();

// Hàm để hiển thị đơn hàng trong modal
function displayCart() {
    // Lấy thông tin sản phẩm từ nguồn dữ liệu (điều này cần thực hiện tùy thuộc vào cách bạn lưu trữ dữ liệu sản phẩm)
    var products = [
      { id: 1, name: "Sản phẩm 1", price: 10, quantity: 2 },
      { id: 2, name: "Sản phẩm 2", price: 15, quantity: 1 },
    ];
  
    var cartContent = document.getElementById("cartContent");
    cartContent.innerHTML = ""; // Xóa nội dung cũ
  
    var totalAmount = 0;
  
    // Hiển thị thông tin từng sản phẩm trong đơn hàng
    products.forEach(function (product, index) {
      var row = document.createElement("tr");
      row.innerHTML = `
          <td>${index + 1}</td>
          <td>${product.name}</td>
          <td>${product.price}</td>
          <td>
            <button class="btn btn-sm btn-success" onclick="updateQuantity(${
              product.id
            }, 'decrease')">-</button>
            <span id="quantity-${product.id}">${product.quantity}</span>
            <button class="btn btn-sm btn-primary" onclick="updateQuantity(${
              product.id
            }, 'increase')">+</button>
          </td>
          <td id="total-${product.id}">${product.price * product.quantity}</td>
          <td><button class="btn btn-danger btn-sm" onclick="removeProduct(${
            product.id
          })">Xóa</button></td>
        `;
      cartContent.appendChild(row);
  
      totalAmount += product.price * product.quantity;
    });
  
    // Hiển thị tổng số tiền phải thanh toán
    document.getElementById("totalAmount").textContent = totalAmount;
  }

  
document.addEventListener('DOMContentLoaded', function() {
  // Lấy ra các phần tử cần thiết
  var searchInput = document.getElementById('searchInput');
  var searchBtn = document.getElementById('searchBtn');

  // Thêm sự kiện click cho nút tìm kiếm
  searchBtn.addEventListener('click', function(event) {
      // Ngăn chặn hành động mặc định của form
      event.preventDefault();
      // Gọi hàm tìm kiếm khi người dùng nhấn vào nút tìm kiếm
      search();
  });

  // Thêm sự kiện keyup cho trường input
  searchInput.addEventListener('keyup', function(event) {
      // Kiểm tra nếu phím Enter được nhấn
      if (event.keyCode === 13) {
          // Gọi hàm tìm kiếm khi người dùng nhấn phím Enter
          search();
      }
  });

  // Hàm tìm kiếm
  function search() {
      var keyword = searchInput.value.trim(); // Lấy giá trị nhập vào và loại bỏ các khoảng trắng đầu và cuối
      // Kiểm tra xem trường input có dữ liệu không
      if (keyword !== '') {
        var currentURL = window.location.href;
        var newURL = currentURL + '?searchKey=' + encodeURIComponent(keyword);
        
        window.location.href = newURL;
      } else {
          // Nếu trường input trống, không thực hiện tìm kiếm
          alert('Vui lòng nhập từ khóa tìm kiếm');
      }
  }
});

