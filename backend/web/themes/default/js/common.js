/**
 * Created by bac_b on 27/08/2016.
 */

/**
 *
 * @param id
 * @param status
 * @param url
 * @return Change status items
 */
function changeStatusItems(id, status, url)
{
    var data = {id: id, status: status};
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'POST',
        data: data,
        'beforeSend': function() {
            $('.spinner').show();
        },
        success: function(json) {
            $('.spinner').hide();
            if (json.status == true) {
                if (status == 1) {
                    $('#item-status-' + id).html('<a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('+ id +', 0, \''+ url +'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a>');
                } else {
                    $('#item-status-' + id).html('<a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('+ id +', 1, \''+ url +'\')"><i class="fa fa-check" style="color: green"></i></a>');
                }
            }
        },
        error: function (x, status, error) {
            if (x.status == 403) {
                $('.spinner').hide();
                // swal('Xảy ra lỗi', 'Bạn không có quyền thực hiện chức năng này');
                return false;
            } else {
                $('.spinner').hide();
                // swal('Xảy ra lỗi', 'Đã có lỗi xảy ra trong quá trình xử lý!');
                return false;
            }
        }
    });
}
