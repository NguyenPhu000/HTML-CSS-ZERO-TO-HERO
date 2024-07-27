$(document).ready(function () {
  //menu
  $(".itemOrder").hide();
  $(".cateOrder").click(function () {
    $(this).next().slideDown();
  });
  $(".itemOrder").mouseleave(function () {
    $(this).slideUp();
  });
  //img slide
  var s = $(".div_list").children();
  var l = s.length;
  var i = 0;
  setInterval(function () {
    if (i === 1) {
      i = 0;
    }
    var p = $(s[i]).attr("src");
    $("img_view").attr("src", p);
    i++;
  }, 10);
  //jq ajax
  $(".link_menu").click(function () {
    var v = $(this).attr("value");
    $("#get_content").load("./pageJS/" + v + ".php");
  });
  //form
  // $("#formreg").submit(function () {
  //   var username = $("input[name*='username']").val();
  //   if (username.length === 0 || username.length < 6) {
  //     $("input[name*='username']").focus();
  //     $("#noteForm").html("Username chưa hợp lệ!");
  //     return false;
  //   }
  //   var password = $("input[name*='password']").val();
  //   if (password.length === 0 || password.length < 6) {
  //     $("input[name*='password']").focus();
  //     $("#noteForm").html("Password chưa hợp lệ!");
  //     return false;
  //   }
  //   var hoten = $("input[name*='hoten']").val();
  //   if (hoten.length === 0 || hoten.length < 6) {
  //     $("input[name*='hoten']").focus();
  //     $("#noteForm").html("Họ tên chưa hợp lệ!");
  //     return false;
  //   }
  //   var ngaysinh = $("input[name*='ngaysinh']").val();
  //   if (ngaysinh.length === 0) {
  //     $("input[name*='ngaysinh']").focus();
  //     $("#noteForm").html("Ngày sinh chưa hợp lệ!");
  //     return false;
  //   }
  //   var diachi = $("input[name*='diachi']").val();
  //   if (diachi.length === 0) {
  //     $("input[name*='diachi']").focus();
  //     $("#noteForm").html("Địa chỉ chưa hợp lệ!");
  //     return false;
  //   }
  //   var dienthoai = $("input[name*='dienthoai']").val();
  //   if (dienthoai.length === 0) {
  //     $("input[name*='dienthoai']").focus();
  //     $("#noteForm").html("Điện thoại chưa hợp lệ!");
  //     return false;
  //   }
  //   return true;
  // });
  //btn_update - User
  $("temps").click(function () {
    var iduser = $(this).attr("value");
    $("#right_inner").load("./elements/mUser/userUpdate.php?iduser=" + iduser);
  });
  //btn update - loaihang
  $("#w-update").hide();
  // open update
  $(".w-update-open-btn").click(function (e) {
    e.preventDefault();
    //tọa đô bằng parameter(tham biến)
    // alert(e.pageX + "--" + e.pageY);
    // gán thông số mới có được vào thẻ div update
    // $("#w-update").css("left", e.pageX + 30);
    $("#w-update").css("top", e.pageY + 50);

    var $idloaihang = $(this).attr("value");

    //load ra bằng ajax
    //dùng gì load đó(post,get,...)
    $("#w-update-form").load(
      "./elements/mLoaihang/loaihangUpdate.php",
      { idloaihang: $idloaihang },
      function (response, status, request) {
        this; // dom element
      }
    );
    //mở div
    $("#w-update").show();
  });
  // close update
  $(".w-update-close-btn").click(function (e) {
    e.preventDefault();
    $("#w-update").hide();
  });
});
