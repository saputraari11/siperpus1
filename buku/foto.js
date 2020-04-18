var pesan1;

function tambah() {
    var ari = $("#file").prop("files")[0];
    var form = new FormData();
    form.append("file", ari);

    $.ajax({
        url: "prosestambah.php",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form,
        type: 'post',
        success: function(response) {
            if (!response == 0) {
                $("#im").attr("src", response);
                $("#modul").css("display", "none");
                pesan1 = $("#im").attr("src");;
            } else {
                alert("gagal");
                $("#modul").css("display", "none");
            }
        }
    });

}
$("#fa").click(function() {
    $("#modul").css("display", "block");


    $(".modul-footer #btn").click(function() {

        tambah();

    });

});
$(".clos").click(function() {
    $("#modul").css("display", "none");

});

$("#simpan").click(function() {
    if (pesan1 == null) {
        pesan1 = "buku.png";
    }

    $.post("prosestambah.php", {
            attrr: pesan1,
            tmp: pesan1,
            judul: $(".judul").val(),
            penerbit: $(".penerbit").val(),
            pengarang: $(".pengarang").val(),
            ringkasan: $(".ringkasan").val(),
            stok: $(".stok").val(),
            katagori: $(".katagori").val(),
        },
        function(data) {
            $(".tb").each(function() {
                $(this).prop("disabled", true);
            });
            alert(data);
        }
    );
});


//edit
function edit() {
    var ari = $("#file").prop("files")[0];
    var form = new FormData();
    form.append("file", ari);
    if (ari !== undefined) {
        $.ajax({
            url: "prosesedit.php",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form,
            type: 'post',
            success: function(response) {
                if (!response == 0) {
                    if ($("#im").attr("src") !== "foto/buku.png") {
                        pesanhapus = $("#im").attr("src");
                    }
                    $("#im").attr("src", response);
                    pesanedit = $("#im").attr("src");;
                }
            }
        });
    }
}
var pesanhapus;
var pesanedit;
$("#fotoedit").click(function() {
    $("#modul").css("display", "block");

    if ($("#im").attr("src") == "foto/buku.png") {
        $(".t-content").hide();
    } else {
        $("#trash").click(function() {
            pesanhapus = $("#im").attr("src");
            $("#im").attr("src", 'foto/buku.png');
            pesanedit = $("#im").attr("src");
        });
    }

    $(".modul-footer #btn").click(function() {
        edit();
        $("#modul").css("display", "none");
    });

});
$("#simpanedit").click(function() {
    $.post("prosesedit.php", {
            hapus: pesanhapus,
            attrr: pesanedit,
            id: $(".id_buku").val(),
            judul: $(".judul").val(),
            penerbit: $(".penerbit").val(),
            pengarang: $(".pengarang").val(),
            ringkasan: $(".ringkasan").val(),
            stok: $(".stok").val(),
            katagori: $(".katagori").val(),
        },
        function(data) {
            $(".tb").each(function() {
                $(this).prop("disabled", true);
            });
            alert(data);
        }
    );
});