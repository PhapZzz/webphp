// function sortTable(columnIndex, ascending) {
//     var table = document.querySelector('.product-table');
//     // console.log(table);
//     var rows = Array.from(table.querySelectorAll('tbody tr'));
//     // console.log(rows);
//     // Sắp xếp các hàng dựa trên giá trị của cột columnIndex
//     rows.sort(function(rowA, rowB) {
//         var valueA = rowA.cells[columnIndex].textContent.trim();
//         // console.log(valueA);
//         // console.log("gg");
//         var valueB = rowB.cells[columnIndex].textContent.trim();
//         console.log(valueB);
//         if (ascending) {
//             return valueA.localeCompare(valueB); 
//         } else {
//             return valueB.localeCompare(valueA);
//         }
//     });

//     // Xóa tất cả các hàng trong bảng
//     while (table.querySelector('tbody').firstChild) {
//         table.querySelector('tbody').removeChild(table.querySelector('tbody').firstChild);
//     }

//     // Thêm lại các hàng đã sắp xếp vào bảng
//     rows.forEach(function(row) {
//         table.querySelector('tbody').appendChild(row);
//     });
// }

$(document).ready(function(){
    $(".btn").on('click',function(e){
        
        e.preventDefault();
        var name = $(this).attr("name");
        // console.log(title);
        var temp = name.split("_");
        var title = temp[0];
        // console.log(title);
        var ODER = temp[1];
        // console.log(ODER);
        $.ajax({
            // url: url_1 + page,
            url: "index.php?controller=admin&action=admin",
            method: 'GET',  
            data: {title:title,oder:ODER,
            }, 
            success: function(e){
                // console.log(e);
                $("#content_1").html(e);
            }
        });
    });
});
