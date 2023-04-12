$(function () {
    var i = 0;
    $('#btn-add').click(function (e) {
        e.preventDefault();
        i++;

        $('#newObject').append(
            '<tr id="newRowObject' + i + '">' +
            '    <th>'+
            '        <select name="" id="">'+
            '            <option value="" selected>AIG _ American International Group</option>'+
            '            <option value="">Allianz Global Corporate & Specialty Re</option>'+
            '            <option value="">Austral Resseguradora S.A.</option>'+
            '            <option value="">Axa Xl Insurance Company Uk Limited</option>'+
            '            <option value="">Beazley Group</option>'+
            '            <option value="">Berkley Insurance Company</option>'+
            '        </select>'+
            '    </th>'+
            '    <th>'+
            '        <input type="text" id="country" name="country">'+
            '    </th>'+
            '    <th>'+
            '        <input type="text" id="country" name="country">'+
            '    </th>'+
            '    <th>'+
            '        <select name="" id="">'+
            '          <option value="" selected>AG</option>'+
            '          <option value="">RC</option>'+
            '          <option value="">BQ</option>'+
            '          <option value="">RI</option>'+
            '        </select>'+
            '    </th>'+
            '    <th>'+
            '        <input type="text" id="country" name="country">'+
            '    </th>'+
            '    <th>'+
            '           <button id=' + i + ' type="button" class="btn btn-danger btn-xs btn-delete"><span'+
            '                    class="glyphicon glyphicon-remove" aria-hidden="false"></span></button>'+
            '        </th>'+
            '</tr>'
        );

    });

    $(document).on('click', '.btn-delete', function (e) {

        //alert('xd');
        e.preventDefault();

        var id = $(this).attr('id');
        $('#newRowObject' + id).remove();
    });

});
