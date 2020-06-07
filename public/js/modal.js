$(document).ready(function () {
    $(".buttonModal").on('click',function () {
        const id = $(this).data('id');
        var data;
        axios.get('http://localhost/PasarTradisional/public/History/getDetailDriver/'+id)
            .then(value => {
                data = value['data'];
                $("#detail").html('<table width="100%" style="font-size:14px"><tr><td rowspan="7"><img src="http://localhost/PasarTradisional/public/uploads/'+data['photo']+'" class="rounded" height="200px" width="150px"></td></tr><tr><td width="150">Id</td><td width="10">:</td><td>'+data['id']+'</td></tr><tr><td>Nama Lengkap</td><td>:</td><td>'+data['name']+'</td></tr><tr><td>Status</td><td>:</td><td>'+data['status']+'</td></tr><tr><td>Join at</td><td>:</td><td>'+data['join_at']+'</td></tr><tr><td>Phone Number</td><td>:</td><td>'+data['whatsapp_number']+'</td></tr><tr><td>Id Telegram</td><td>:</td><td>'+data['telegram_id']+'</td></tr></table>');
            });
    })
});