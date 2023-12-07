<div class="row mb footer">
  <div class="footer-content">
    <div class="contact-info">
      <h3>Liên Hệ</h3>
      <p>Email: hoangthanh081102@gmail.com</p>
      <p>Điện thoại: 0346024594</p>
      <p>Địa chỉ: 94 Nguyễn Trãi, Q1, TP.HCM</p>
    </div>
    <div class="company-info">
      <h3>Thông Tin Công Ty</h3>
      <p>Chúng tôi là một công ty chuyên cung cấp giày fake với chất lượng đảm bảo.</p>
      <p>Địa chỉ công ty: 123 Nguyễn Trãi , Quận 1, Thành phố Hồ Chí Minh</p>
    </div>
    <div class="social-media">
      <h3>Kết Nối</h3>
      <a href="#" target="_blank" title="Facebook"><img src="./accest/image/Facebook-icon.png" alt="Facebook Icon"></a>
      <a href="#" target="_blank" title="Twitter"><img src="./accest/image/Twitter.png" alt="Twitter Icon"></a>
      <a href="#" target="_blank" title="Instagram"><img src="./accest/image/Instagram.webp" alt="Instagram Icon"></a>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Mặc định chọn color đầu tiên
    const defaultColor = document.querySelector(".color button");
    if (defaultColor) {
      defaultColor.classList.add("selected");
      updateSizeList(defaultColor.dataset.color);
    }

    // Xử lý sự kiện click trên các button màu
    document.querySelectorAll(".color button").forEach(function(button) {
      button.addEventListener("click", function() {
        // Loại bỏ lựa chọn trước đó và thêm lựa chọn mới
        document.querySelectorAll(".color button").forEach(function(btn) {
          btn.classList.remove("selected");
        });
        button.classList.add("selected");

        // Cập nhật danh sách size và số lượng
        updateSizeList(button.dataset.color);
      });
    });

    // Hàm cập nhật danh sách size và số lượng
    function updateSizeList(colorId) {
      // Lọc danh sách size và số lượng theo màu được chọn
      const filteredList = <?php echo json_encode($listctsp); ?>.filter(function(item) {
        return item.color_id == colorId;
      });

      // Hiển thị danh sách size mới
      const sizeContainer = document.querySelector(".size");
      sizeContainer.innerHTML = "";
      filteredList.forEach(function(item, index) {
        const sizeButton = document.createElement("button");
        sizeButton.classList.add("size");
        sizeButton.dataset.size = item.size_id;
        sizeButton.innerHTML = '<span>' + item.size_name + '</span>';

        sizeButton.addEventListener("click", function() {
          // Loại bỏ selected class từ tất cả các button size
          document.querySelectorAll(".size button").forEach(function(btn) {
            btn.classList.remove("selected");
          });

          // Thêm selected class vào button size mới được chọn
          sizeButton.classList.add("selected");

          // Xử lý khi chọn size
          // Thực hiện các thao tác cần thiết, ví dụ: hiển thị số lượng
          const soluongContainer = document.querySelector(".soluong");
          soluongContainer.innerHTML = '<p>Còn lại ' + item.stock_quantity + ' sản phẩm</p>';
        });

        // Nếu là size đầu tiên, tự động chọn
        if (index === 0) {
          sizeButton.classList.add("selected");
          // Thực hiện các thao tác cần thiết khi chọn size đầu tiên, ví dụ: hiển thị số lượng
          const soluongContainer = document.querySelector(".soluong");
          soluongContainer.innerHTML = '<p>Còn lại ' + item.stock_quantity + ' sản phẩm</p>';
        }
console.log(sizeContainer);
        sizeContainer.appendChild(sizeButton);

        $('button.size').click( function(event){
        let id = $(this).data('size');
        event.preventDefault();
        localStorage.setItem('sizeId', id);
        })
      });

      document.querySelector("span").addEventListener("click", function(event){
    alert('');
  event.preventDefault()
});
    }
  });


$(function() {
//   document.querySelector("button").addEventListener("click", function(event){
//     alert(':(');
//   event.preventDefault()
// });

$('button.color').click( function(event){
  let id = $(this).data('color');
  event.preventDefault();
  localStorage.setItem('colorId', id);
});

// $('button.size').click( function(event){
//   id = $(this).data('size');
//   alert('idS='+id);
//   event.preventDefault();
// });

$('button.buy').click( function(event){
  alert("Đã thêm sản phẩm vào giỏ hàng");
  event.preventDefault();
  $.ajax({
    url:'cart.php',
    type:'POST',
    data:{product_id:localStorage.getItem('productId'), color_id:localStorage.getItem('colorId') , size_id:localStorage.getItem('sizeId') },
    success:function(data){
      console.log(data);
    }
  });
  //localStorage.setItem('colorId', id);
});

});

localStorage.setItem('productId', '<?=$_GET['id']??'' ?>' )

</script>


</body>

</html>