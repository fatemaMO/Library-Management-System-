alert("hiiiiiiiiii");
// $('#search-book').on('keyup', function () {
//     var value = $("#search-book").val();
//     $.ajax({
//         type: 'POST',
//         url: '/bookSearch',
//         data: {
//             // '_token': $('input[name=_token]').val(),
//             '_token': "{{ csrf_token() }}",
//             value: value
//         },
//         success: function (msg) {
//             // alert("jhhj");
//             if (msg.flag == 0)
//             {
//                 $(".seacrch_books_contrent").html(msg.view);
//                 $(".orginal-search").css("display", "none");
//             }
//             else if (msg.flag == 1)
//             {
//                 $(".orginal-search").css("display", "block");
//                 $(".seacrch_books_contrent").html("");
//             }
//         }
//     });
// });