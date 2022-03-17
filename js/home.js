$(document).ready(function () {

    readData();


    $('td').hover(function () {
        $(this).css('display', 'none');
    });



    //=========   read data ==============
    function readData() {
        txt = "";
        $.ajax({
            url: "backend/post_read.php",
            method: "GET",
            dataType: 'json',
            success: function (res) {
                if (res) {
                    d = res;
                } else {
                    d = "no data";
                }

                for (i = 0; i < d.length; i++) {
                    a = d[i].p_id;
                    myPid = { pid: a };
                    txtp = "";

                    $.ajax({
                        url: "backend/point_read.php",
                        method: "POST",
                        dataType: 'json',
                        async: false,
                        data: JSON.stringify(myPid),
                        success: function (res2) {

                            if (res2 == '0') {
                                pd = "";
                            } else {
                                pd = res2;
                            }
                            cnt = 1;
                            for (ii = 0; ii < pd.length; ii++) {
                                if (pd[ii].p_a == null && pd[ii].p_b != null) {
                                    txtp += "<tr><td class='text-center'>" + cnt + "</td><td class='text-center'>type..</td><td class='text-center'>" + pd[ii].p_b + "</td></tr>";
                                } else if (pd[ii].p_a != null && pd[ii].p_b == null) {
                                    txtp += "<tr><td class='text-center'>" + cnt + "</td><td class='text-center'>" + pd[ii].p_a + "</td><td class='text-center'>type..</td></tr>";
                                } else if (pd[ii].p_a != null && pd[ii].p_b != null) {
                                    txtp += "<tr><td class='text-center'>" + cnt + "</td><td class='text-center'>" + pd[ii].p_a + "</td><td class='text-center'>" + pd[ii].p_b + "</td></tr>";
                                } else {
                                    txtp += "<tr><td class='text-center'>" + cnt + "</td><td class='text-center'>type..</td><td class='text-center'>type..</td></tr>";
                                }
                                cnt++;

                            }
                        }
                    });

                    txt += "<div class='border rounded border-primary p-2 mb-5 cc'><h5 class='text-center mt-2 border border-primary p-2'>" + d[i].p_title + "<i>...by @" + d[i].u_name +
                        "</i></h5><table class='table table-light table-hover table-bordered'><thead class='table-dark'><tr><th class='text-center'>Points</th><th class='text-center'>Side A</th><th class='text-center'>Side B</th></tr></thead><tbody>" + txtp +
                        "<tr><td colspan='2'><textarea type='text' id='ta" + d[i].p_id + "' class='form-control textPart' placeholder='type here'></textarea></td><td><textarea type='text' id='tb" + d[i].p_id + "' class='form-control textPart' placeholder='type here'></textarea></td></tr>" +
                        "<td colspan='2' class='table-active text-center'><button part='a' pid=" + d[i].p_id + " class='btn btn-sm btn-primary cmtPart'>Save</button></td><td class='text-center table-active'><button part='b' pid=" + d[i].p_id + "   class='btn btn-sm btn-primary cmtPart'>Save</button></td></tr></tbody></table></div>";
                }
                $("#postDiv").html(txt);
            }
        });

    };

    //===================      insert post data ====================
    $("#postSubmitId").on("click", function (e) {
        e.preventDefault();

        let pst = $("#postTitleId").val();
        let aid = $("#aid").val();

        mdata = { postt: pst, aid: aid };
        //console.log(mdata);

        $.ajax({
            url: "backend/insertPostTitle.php",
            method: "POST",
            data: JSON.stringify(mdata),
            success: function (res) {
                if (res == "1") {
                    //console.log("success: " + res);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Posted',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $("#postTitleId").val("");
                    readData();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: res,
                    })
                    //console.log(res);
                }
            },
        });
    });



    //================ comment write POINT adding =======================
    $(document).on("click", ".cmtPart", function () {
        let pid = $(this).attr("pid");
        let part = $(this).attr("part");

        let aname = $("#aname").val();



        if (part == 'a') {

            c = "a";
            x = "#ta" + pid;

            if ($(x).val() != '') {
                tPart = $(x).val() + "<b><i>[-by @" + aname + "]";
            }
            else {
                tPart = $(x).val();
            }

            //console.log(tPart);
        } else {
            c = "b";
            x = "#tb" + pid;

            if ($(x).val() != '') {
                tPart = $(x).val() + "<b><i>[-by @" + aname + "]";
            } else {
                tPart = $(x).val();
            }
            //console.log(tPart);
        }
        //console.log(tPart);
        mData = { pid: pid, part: c, text: tPart };
        $.ajax({
            url: "backend/insertPoints.php",
            method: "POST",
            data: JSON.stringify(mData),
            success: function (res) {
                if (res == "1") {
                    //console.log("success: " + res);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: res,
                    })

                }
                readData();
                //console.log(res);
            },
        });

    });


});