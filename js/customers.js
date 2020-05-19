$(document).ready(function () {

    // Add Customer Tabs
    $('#customerSegment .item').tab();
    $('#addCustomer .step').tab();


    // Image Upload
    $("#fileUpload").on("click", function () {
        $('#hidden-upload').click();
    });

    $(document).on('change', '#hidden-upload', function () {
        var property = document.getElementById('hidden-upload').files[0];
        var formData = new FormData();
        formData.append('file', property);
        $.ajax({
            url: 'php/upload.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.ui.placeholder.segment').addClass('loading');
            },
            success: function (data) {
                $('#previewImage').attr("src", "images/upload/" +data);
                $('.ui.placeholder.segment').removeClass('loading');
                $('#save').css('display','none');
                $('#contractButton').css('display','inline');
                $('#contractStep').removeClass('disabled');
            }
        })

    })


    // Contract
    $('#contractButton').click(function () {
        $('#addCustomer .step').tab('change tab', 'sozlesmeGoruntule');
        $('#contractButton').css('display','none');
        $('#saveMaster').css('display','inline');
        $('#close').css('display','none');
        
    });
    $('#saveMaster').click(function() {
        $.toast({
            heading: 'Kayıt Basarılı',
            text: 'Müsteri basariyla kaydedildi.Güncel tablo icin sayfayı yenileyin.',
            position: 'bottom-right',
            icon: 'success',
            stack: false
        })
    });

    //Add  Modal
    $('#addButton').click(function () {
        $('#addModal').modal('show');

    });


    // Delete Customer Modal
    $('#deleteCustomer').click(function () {
        $('#deleteModal').modal('show');
    });



    //Show Contract
    var pdfOption = {
        height: "400px",
        pdfOpenParams: {
            view: 'FitV',
            pagemode: 'thumbs',
        }
    };
    PDFObject.embed("/pdf/sozlesme.pdf", "#showContract", pdfOption);
    
    //Generated Contract
    var pdfOption = {
        height: "400px",
        pdfOpenParams: {
            view: 'FitV',
            pagemode: 'thumbs',
        }
    };
    PDFObject.embed("/pdf/sozlesme.pdf", "#contract", pdfOption);

    var id;
    $('tbody tr').click(function () {
        id = $(this).data('customer-id');
        console.log(id);
        $.ajax({
            url: 'php/fetch_customer.php',
            type: 'POST',
            data: {
                'id': id
            },
            success: function (data) {
                var customer = JSON.parse(data);
                $("#showModal #customerImage").attr('src', 'images/upload/'+customer.image);
                $("#showModal .customer.name").html(customer.name + ' ' + customer.surname);
                $("#showModal .customer.phone").html(customer.phone);
                $("#showModal .customer.tcno").html(customer.tcno);
                $("#showModal .customer.contract").html(customer.contract_time);
                $("#showModal .customer.apartment").html(customer.apartment);
                $("#showModal .customer.amount").html(customer.amount + '₺');
                $('#showModal').modal('show');

            },
            error: function (error) {
                alert(error);
            }
        })

    });




    // Ajax
    $('#save').click(function () {
        $.ajax({
            url: 'php/action.php',
            type: 'POST',
            data: $('#customerForm').serialize(),
            success: function (data) {
                alert(data);
                // setTimeout(function () {
                //     $('#addModal').modal('hide');
                // }, 3000);
            },
            error: function (error) {
            }
        });
        $('#addCustomer .step').tab('change tab', 'fotografEkle');
    });


    $('#deleteCustomerButton').click(function () {
        $.toast({
            heading: 'İslem Basarili',
            text: 'Müsteri basarıyla silindi. Güncel tablo icin sayfayi yenileyin.',
            icon: 'success',
            position: 'bottom-right',
            loader: true,
            loaderBg: '#9EC600'
        })

    });






    // Customers Data Table
    var table = $('#customersTable').DataTable({
        lengthChange: false,
        buttons: ['excel', 'pdf'],
        order: [
            [0, 'asc']
        ],
    });

    table.buttons().container()
        .appendTo($('div.eight.column:eq(0)', table.table().container()));

});

var barChart = echarts.init(document.getElementById('barChart'));
option = {
    dataset: {
        source: [
            ['amount', 'product'],
            [58212, 'Matcha Latte'],
            [78254, 'Milk Tea'],
            [41032, 'Cheese Cocoa'],
            [12755, 'Cheese Brownie'],
            [20145, 'Matcha Cocoa'],
            [79146, 'Tea'],
            [91852, 'Orange Juice'],
            [101852, 'Lemon Juice'],
            [20112, 'Walnut Brownie']
        ]
    },
    grid: {
        containLabel: true
    },
    xAxis: {
        name: 'amount'
    },
    yAxis: {
        type: 'category'
    },
    visualMap: {
        orient: 'horizontal',
        left: 'center',
        min: 10,
        max: 100000,
        text: ['High Score', 'Low Score'],
        // Map the score column to color
        dimension: 0,
        inRange: {
            color: ['#D7DA8B', '#E15457']
        }
    },
    series: [{
        type: 'bar',
        encode: {
            // Map the "amount" column to X axis.
            x: 'amount',
            // Map the "product" column to Y axis
            y: 'category'
        }
    }]
}
barChart.setOption(option);