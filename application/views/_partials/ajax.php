<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        // View data unit
        $('#tunit').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat.....",
                "searchPlaceholder": "Kata Kunci..."
            },
            "serverSide": true,
            "ajax": "<?=site_url('unit/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "un_id", "visible": false},
                {"data": "un_nama"},
                {"data": "action"}
            ],
            "order": [[1, 'dsc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // View data shift
        $('#tshift').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat.....",
                "searchPlaceholder": "Kata Kunci..."
            },
            "serverSide": true,
            "ajax": "<?=site_url('shift/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "shf_id", "visible": false},
                
                {"data": "shf_deskripsi"},
                {"data": "pesan"},
                {"data": "action"}
            ],
            "order": [[1, 'dsc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // View data user
        $('#tuser').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat.....",
                "searchPlaceholder": "Kata Kunci..."
            },
            "serverSide": true,
            "ajax": "<?=site_url('user/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "usr_id", "visible": false},
                {"data": "usr_username"},
                {"data": "usr_nama"},
                {"data": "usr_level"},
                {"data": "action"}
            ],
            "order": [[1, 'asc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // Notification alert
        $("#errorMessage").alert().delay(4000).slideUp('slow');
        $("#successMessage").alert().delay(4000).slideUp('slow');
    });

    
</script>