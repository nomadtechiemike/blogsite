var media_no_files = $("#mediaNoFiles"),
    media_wrapper = $("#medialibrary-myfiles"),
    upload_modal = $("#upload_modal"),
    shareTable = $("#modalShareTable tbody"),
    select_member = $("#selectMember"),
    Filesystem = {
        initResources: function() {
            $(".styled").uniform(), $(".tip").tooltip(), jQuery().select2 && $(".select-full").select2({
                width: "100%",
                minimumResultsForSearch: -1
            }), $('[data-rel="fancybox"]').fancybox({
                openEffect: "none",
                closeEffect: "none",
                width: 840,
                height: 585,
                overlayShow: !0,
                overlayOpacity: .7,
                helpers: {
                    media: {}
                }
            })
        },
        refreshMedia: function(e) {
            $(".galleryLoading").show(), media_wrapper.load(BMedia.routes.files_show + "?action=" + e, function(e) {
                e.error ? Botble.showNotice("error", e.message, Botble.languages.notices_msg.error) : ($(".galleryLoading").fadeOut(500), $(".upload-controls").data("folder", 0), $(".btn_gallery").addClass("active"))
            })
        },
        validateYouTubeLink: function(e) {
            var t = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
            return !!e.match(t) && RegExp.$1
        },
        getYouTubeId: function(e) {
            var t = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/,
                a = e.match(t);
            if (a && 11 == a[2].length) return a[2]
        },
        checkYouTubeVideo: function(e) {
            var t = $("#youtube_url_process"),
                a = $("#youtube_url");
            t.empty().append(Botble.languages.media.processing);
            var l = a.val();
            if (Filesystem.validateYouTubeLink(l) && "" != Botble.variables.youtube_api_key) {
                var s = Filesystem.getYouTubeId(l);
                $.ajax({
                    url: "https://www.googleapis.com/youtube/v3/videos?id=" + s + "&key=" + Botble.variables.youtube_api_key + "&part=snippet",
                    type: "GET",
                    success: function(t) {
                        upload_modal.modal("hide"), a.val(""), Filesystem.createFile(l, t.items[0].snippet.title, e, "youtube")
                    },
                    error: function(e) {
                        Botble.handleError(e)
                    }
                })
            } else "" != Botble.variables.youtube_api_key ? t.empty().append(Botble.languages.media.not_valid_youtube_link) : t.empty().append(Botble.languages.media.env_not_config)
        },
        createFile: function(e, t, a, l) {
            $.ajax({
                url: BMedia.routes.files_store,
                type: "POST",
                data: {
                    name: t,
                    folder: a,
                    url: e,
                    type: l,
                    mode: window.MediaGallery.mode
                },
                success: function(e) {
                    e.error ? Botble.showNotice("error", e.message, Botble.languages.notices_msg.error) : (media_no_files.remove(), $(".list-thumbnails").append(e.file_rows), upload_modal.modal("hide"), $("#youtube_modal").modal("hide"), Filesystem.refreshQuotaDisplay(), Filesystem.initResources(), Botble.showNotice("success", e.message, Botble.languages.notices_msg.success))
                },
                error: function(e) {
                    Botble.handleError(e)
                }
            })
        },
        refreshQuotaDisplay: function() {
            $.ajax({
                url: BMedia.routes.files_quota_refresh,
                type: "GET",
                success: function(e) {
                    $(".quota_percent").text(e.percent), $(".quota_used").text(e.used), $("#quota_progressbar").width(e.percent + "%")
                },
                error: function(e) {
                    Botble.handleError(e)
                }
            })
        },
        createFolder: function(e) {
            $.ajax({
                url: BMedia.routes.folders_create,
                type: "POST",
                data: {
                    name: e,
                    parent: $(".upload-controls").data("folder"),
                    mode: window.MediaGallery.mode
                },
                success: function(e) {
                    e.error ? Botble.showNotice("error", e.message, Botble.languages.notices_msg.error) : (Botble.showNotice("success", e.message, Botble.languages.notices_msg.success), $(".file-rows .list-thumbnails").prepend(e.table_row), $("#modal_new_folder").modal("hide"))
                },
                error: function(e) {
                    Botble.handleError(e)
                }
            })
        },
        deleteFolder: function(e) {
            $.ajax({
                url: BMedia.routes.folders_delete,
                type: "DELETE",
                data: {
                    slug: e
                },
                success: function(t) {
                    t.error ? Botble.showNotice("error", t.message, Botble.languages.notices_msg.error) : ($('.file-rows .list-thumbnails li[data-id="' + e + '"]').fadeOut(500), Botble.showNotice("success", t.message, Botble.languages.notices_msg.success))
                },
                error: function(e) {
                    Botble.handleError(e)
                }
            })
        },
        deleteFile: function(e) {
            $.ajax({
                url: BMedia.routes.files_destroy,
                type: "DELETE",
                data: {
                    id: e
                },
                success: function(t) {
                    t.error ? Botble.showNotice("error", t.message, Botble.languages.notices_msg.error) : ($('.list-files .file-item[data-id="' + e + '"]').fadeOut(500), Botble.showNotice("success", t.message, Botble.languages.notices_msg.success), Filesystem.refreshQuotaDisplay())
                },
                error: function(e) {
                    Botble.showNotice("error", e.message, Botble.languages.notices_msg.error)
                }
            })
        },
        shareFile: function(e, t, a) {
            $.ajax({
                url: BMedia.routes.share_item,
                type: "POST",
                data: {
                    itemId: t,
                    shareWithUsers: e,
                    type: "file",
                    name: a
                },
                success: function(e) {
                    if (e.error) Botble.showNotice("error", e.message, Botble.languages.notices_msg.error);
                    else {
                        Botble.showNotice("success", e.message, Botble.languages.notices_msg.success), $('tr[data-fileId="' + t + '"] td:nth-child(3)').html("yes"), $('tr[data-fileId="' + t + '"] a.shareItem').text("Manage Shares"), shareTable.find("#row-no-shares").remove();
                        for (var a = 0; a < e.data.length; a++) shareTable.append(e.data[a]);
                        select_member.val(""), $(".select2-selection__rendered").html("")
                    }
                },
                error: function(e) {
                    Botble.handleError(e)
                }
            })
        },
        shareFolder: function(e, t, a) {
            $.ajax({
                url: BMedia.routes.share_item,
                type: "POST",
                data: {
                    itemId: t,
                    shareWithUsers: e,
                    type: "folder",
                    name: a
                },
                success: function(e) {
                    if (e.error) Botble.showNotice("error", e.message, Botble.languages.notices_msg.error);
                    else {
                        Botble.showNotice("success", e.message, Botble.languages.notices_msg.success), $('tr[data-folderId="' + t + '"] td:nth-child(3)').html("yes"), $('tr[data-folderId="' + t + '"] a.shareItem').text("Manage Shares"), shareTable.find("#row-no-shares").remove();
                        for (var a = 0; a < e.data.length; a++) shareTable.append(e.data[a]);
                        select_member.val(""), $(".select2-selection__rendered").html("")
                    }
                },
                error: function(e) {
                    Botble.showNotice("error", e.message, Botble.languages.notices_msg.error)
                }
            })
        },
        renameItem: function(e, t, a) {
            var l = "file" == t ? BMedia.routes.files_rename : BMedia.routes.folders_rename;
            $.ajax({
                url: l,
                type: "POST",
                data: {
                    id: e,
                    type: t,
                    name: a
                },
                success: function(e) {
                    e.error ? Botble.showNotice("error", e.message, Botble.languages.notices_msg.error) : ($('.list-files li[data-id="' + e.id + '"] .item-name p').text(a), $("#new_name").val(""), Botble.showNotice("success", e.message, Botble.languages.notices_msg.success))
                },
                error: function(e) {
                    Botble.showNotice("error", e.message, Botble.languages.notices_msg.error)
                }
            })
        },
        bindActionToElement: function() {
            $(document).on("click", ".btn_gallery", function() {
                window.MediaGallery.result = $(this).data("result"), window.MediaGallery.action = $(this).data("action"), window.MediaGallery.current = $(this), $(this).hasClass("active") || Filesystem.refreshMedia($(this).data("action"))
            }), $(document).on("click", ".btn_remove_image", function(e) {
                e.preventDefault(), $(this).closest(".image-box").find("img").hide(), $(this).closest(".image-box").find("input").val("")
            }), $(".plupload").pluploadQueue({
                runtimes: "html5, html4",
                url: BMedia.routes.files_store,
                chunk_size: "100mb",
                unique_names: !0,
                filters: {
                    max_file_size: "1000mb",
                    mime_types: [{
                        title: "Image files",
                        extensions: "jpg,jpeg,gif,png,bmp,gif,svg,psd"
                    }, {
                        title: "Zip files",
                        extensions: "zip"
                    }, {
                        title: "MP3 files",
                        extensions: "mp3"
                    }, {
                        title: "Video files",
                        extensions: "mp4,3gp,3g2,h263,h264,mp4v,mpg4,mpeg,m4u,webm,flv,f4v,m4v,mkv,avi,wmv"
                    }, {
                        title: "PDF files",
                        extensions: "pdf"
                    }, {
                        title: "Word files",
                        extensions: "doc,docx"
                    }, {
                        title: "Excel files",
                        extensions: "xls,xlsx"
                    }, {
                        title: "Txt files",
                        extensions: "txt"
                    }, {
                        title: "Audio files",
                        extensions: "mp3,m3u,wav"
                    }, {
                        title: "Others",
                        extensions: "otf,ttf,woff,swf,sql,xml,css,csv,html,htm"
                    }]
                },
                init: {
                    Init: function(e) {
                        $(".plupload_button.plupload_close").remove(), $(".plupload_buttons").append('<a href="#" class="plupload_button plupload_close" data-dismiss="modal">Finish</a>')
                    },
                    BeforeUpload: function(e, t) {
                        e.settings.multipart_params = {
                            folder: $(".upload-controls").data("folder"),
                            mode: window.MediaGallery.mode,
                            type: "remote",
                            _token: $('meta[name="csrf-token"]').attr("content")
                        }
                    },
                    UploadComplete: function(e, t) {
                        $(".plupload_buttons").show(), $(".plupload_upload_status").hide(), e.refresh(), e.disableBrowse(!1)
                    },
                    FileUploaded: function(e, t, a) {
                        var l = JSON.parse(a.response);
                        l.error ? Botble.showNotice("error", l.message, Botble.languages.notices_msg.error) : (media_no_files.remove(), $(".list-thumbnails").append(l.file_rows), Filesystem.initResources(), Filesystem.refreshQuotaDisplay(), Botble.showNotice("success", l.message, Botble.languages.notices_msg.success))
                    }
                }
            }), $("#add_modal").on("hidden.bs.modal", function() {
                $(this).data("bs.modal", null)
            }), media_wrapper.on("click", "#youtube_add", function(e) {
                upload_modal.modal("hide"), $("#process_vid").attr("data-folder", $(".upload-controls").data("folder")), $("#youtube_modal").modal("show"), $("#youtube_url").focus().on("keypress", function(e) {
                    13 === e.which && Filesystem.checkYouTubeVideo($(".upload-controls").data("folder"))
                })
            }), $("#process_vid").on("click", function(e) {
                Filesystem.checkYouTubeVideo($(".upload-controls").data("folder"))
            }), $(document).on("click", "#create_folder", function(e) {
                e.preventDefault();
                var t = $("#folder_name").val();
                Filesystem.createFolder(t)
            }), $(".modal-content").unbind().on("click", "[data-action=attach]", function(e) {
                if (e.preventDefault(), "image_post" == window.MediaGallery.action)
                    if ("youtube" == $(this).data("type")) {
                        var t = $(this).data("src");
                        t = t.replace("watch?v=", "embed/"), CKEDITOR.instances[window.MediaGallery.result].insertHtml('<iframe width="420" height="315" src="' + t + '" frameborder="0" allowfullscreen></iframe>')
                    } else $(this).data("type").indexOf("image") >= 0 ? CKEDITOR.instances[window.MediaGallery.result].insertHtml('<img src="' + Botble.routes.home + "/" + $(this).data("src") + '" alt="' + Botble.routes.home + "/" + $(this).data("src") + '" />') : CKEDITOR.instances[window.MediaGallery.result].insertHtml('<a href="' + Botble.routes.home + "/" + $(this).data("src") + '">' + $(this).data("name") + "</a>");
                else if ("featured_image" == window.MediaGallery.action) window.MediaGallery.current.closest(".image-box").find(".image-data").val($(this).data("src")), window.MediaGallery.current.closest(".image-box").find(".preview_image").attr("src", $(this).data("thumb")).show();
                else if ("attachment" == window.MediaGallery.action) window.MediaGallery.current.closest(".attachment-wrapper").find(".attachment-id").val($(this).closest("li").data("id")), $(".attachment-details").html('<a href="' + Botble.routes.home + "/" + $(this).data("src") + '" target="_blank">' + $(this).data("name") + "</a>");
                else if ("gallery_image" == window.MediaGallery.action) {
                    var a = window.MediaGallery.current.closest(".image-box").find(".image-data");
                    	
                        l = [];
                    "" != a.val() && (l = $.parseJSON(a.val())), l.push({
                        img: $(this).data("src"),
                        description: null
                    }), $(".list-photos-gallery").append('<li><img src="/' + $(this).data("src") + '" /></li>'), a.val(JSON.stringify(l)), $(".reset-gallery").removeClass("hidden")
                } else if ("slider_image" == window.MediaGallery.action) {
                    var s = {
                        imgurl: Botble.routes.home + "/" + $(this).data("src"),
                        imgid: $(this).closest("li").data("id")
                    };
                    UniteLayersRev.addLayerImagePublic(s, window.MediaGallery.current.data("isstatic")), console.log(window.MediaGallery.current.data("isstatic"));
                    var i = {};
                    i.image_url = s.imgurl, UniteLayersRev.updateCurrentLayer(i), UniteLayersRev.redrawLayerHtmlPublic(UniteLayersRev.selectedLayerSerial), UniteLayersRev.add_layer_change(), UniteLayersRev.scaleNormalPublic()
                } else if ("slider_change_image" == window.MediaGallery.action) {
                    var s = {
                        imgurl: Botble.routes.home + "/" + $(this).data("src"),
                        imgid: $(this).closest("li").data("id")
                    };
                    jQuery("#divbgholder").css("background-image", "url(" + s.imgurl + ")"), jQuery("#slide_selector .list_slide_links li.selected .slide-media-container ").css("background-image", "url(" + s.imgurl + ")"), jQuery("#image_url").val(s.imgurl), jQuery("#image_id").val(s.imgid), UniteLayersRev.changeSlotBGs(), jQuery(".bgsrcchanger:checked").click(), jQuery('input[name="kenburn_effect"]').is(":checked") && jQuery('input[name="kb_start_fit"]').change()
                } else if ("slider_audio_video" == window.MediaGallery.action) jQuery('input[name="' + window.MediaGallery.result + '"]').val($(this).data("src"), []), jQuery("#html5_url_audio, #html5_url_ogv, #html5_url_webm, #html5_url_mp4").change();
                else if ("slider_select_video_image" == window.MediaGallery.action) {
                    jQuery('input[id="' + window.MediaGallery.result + '"]').val($(this).data("src"), []), jQuery("#html5_url_audio, #html5_url_ogv, #html5_url_webm, #html5_url_mp4").change();
                    var o = UniteAdminRev.getUrlShowImage($(this).closest("li").data("id"), 200, 150, !0);
                    jQuery("#video-thumbnail-preview").css({
                        backgroundImage: "url(" + o + ")"
                    })
                }
                $(".media_modal").modal("hide")
            }), media_wrapper.on("click", ".file-rows .list-thumbnails li.folder_item a", function(e) {
                var t = $(this);
                null != $(this).data("href") && ($(".galleryLoading").fadeIn(500), $.ajax({
                    url: t.data("href"),
                    type: "GET",
                    success: function(e) {
                        if (e.error) Botble.showNotice("error", e.message, Botble.languages.notices_msg.error);
                        else {
                            var t = $(".list-thumbnails");
                            t.html(e.uplevel), null != e.folders && t.append(e.folders), null != e.files && t.append(e.files), $(".galleryLoading").fadeOut(500), $(".upload-controls").data("folder", e.currentFolder), Filesystem.refreshQuotaDisplay(), Filesystem.initResources()
                        }
                    },
                    error: function(e) {
                        Botble.showNotice("error", e.message, Botble.languages.notices_msg.error)
                    }
                }))
            });
            var e = $("#share-confirm-bttn"),
                t = $("#share_modal"),
                a = $("#modalShareTable");
            $(document).on("click", "[data-action=share]", function(a) {
                a.preventDefault(), "folder" == $(this).data("type") ? e.data("type", "folder") : e.data("type", "file"), e.data("pk-id", $(this).data("pk-id")).data("name", $(this).data("name")), select_member.val(""), $(".select2-selection__rendered").html(""), t.modal("show")
            }), t.on("shown.bs.modal", function() {
                $.ajax({
                    url: BMedia.routes.share_list,
                    type: "GET",
                    data: {
                        shareId: e.data("pk-id"),
                        shareType: e.data("type")
                    },
                    success: function(e) {
                        if (e.error) Botble.showNotice("error", e.message, Botble.languages.notices_msg.error);
                        else {
                            a.find("tbody").empty();
                            for (var t = 0; t < e.data.length; t++) a.find("tbody").append(e.data[t])
                        }
                        $(".tip").tooltip(), a.floatThead({
                            scrollContainer: function(e) {
                                return e.closest(".table-responsive")
                            }
                        })
                    },
                    error: function(e) {
                        Botble.handleError(e)
                    }
                })
            }), $(document).on("click", ".removeShare", function(e) {
                e.preventDefault(), $.ajax({
                    url: BMedia.routes.share_remove,
                    type: "POST",
                    data: {
                        shareId: $(this).data("share-id")
                    },
                    success: function(e) {
                        e.error ? Botble.showNotice("error", e.message, Botble.languages.notices_msg.error) : a.find('tr[data-shareid="' + e.data + '"]').fadeOut(500)
                    },
                    error: function(e) {
                        Botble.handleError(e)
                    }
                })
            }), e.click(function(e) {
                e.preventDefault();
                var t = select_member.val();
                if (!$.isArray(t)) return Botble.showNotice("error", "Please select at least one user", Botble.languages.notices_msg.error), !1;
                var a = $(this).data("type"),
                    l = $(this).data("pk-id"),
                    s = $(this).data("name");
                "file" == a ? Filesystem.shareFile(t, l, s) : Filesystem.shareFolder(t, l, s)
            });
            var l = $("#file_detail_modal"),
                s = $("#delete-file-confirm-bttn"),
                i = $("#file_delete_modal"),
                o = $("#delete-folder-confirm-bttn"),
                r = $("#folder_delete_modal");
            l.on("shown.bs.modal", function(e) {
                $(this).find(".modal-body").html($(e.relatedTarget).parent().next(".detail-info").html())
            }), $(document).on("click", "[data-action=delete]", function(e) {
                e.preventDefault(), s.data("id", $(this).data("id")), i.modal("show")
            }), s.click(function(e) {
                e.preventDefault(), i.modal("hide"), Filesystem.deleteFile($(this).data("id"))
            }), $(document).on("click", ".deleteFolder", function(e) {
                e.preventDefault(), o.data("slug", $(this).data("slug")), r.modal("show")
            }), o.click(function(e) {
                e.preventDefault(), r.modal("hide"), Filesystem.deleteFolder($(this).data("slug"))
            }), media_wrapper.on("click", ".vjs-youtube", function() {
                $(".video-js .vjs-big-play-button").hide(), $(".vjs-youtube .vjs-poster").hide()
            });
            var n = $("#edit_name_btn"),
                d = $("#new_name"),
                c = $("#edit_name_modal");
            $(document).on("click", "[data-action=edit]", function(e) {
                e.preventDefault(), n.data("id", $(this).data("pk-id")), n.data("type", $(this).data("type")), d.val($.trim($(this).closest("li").find(".item-name").text())), c.modal("show")
            }), n.on("click", function(e) {
                e.preventDefault(), null == d.val() || "" == d.val() ? Botble.showNotice("error", "Name is required!", Botble.languages.notices_msg.error) : (c.modal("hide"), Filesystem.renameItem($(this).data("id"), $(this).data("type"), d.val()))
            }), media_wrapper.on("click", "#refresh_media", function() {
                Filesystem.refreshMedia(window.MediaGallery.action), Filesystem.refreshQuotaDisplay(window.MediaGallery.action)
            });
            var u = $("#gallery"),
                m = $(".list-photos-gallery"),
                h = $("#edit-gallery-item");
            $(".reset-gallery").on("click", function(e) {
                e.preventDefault(), $(".list-photos-gallery li").remove(), u.val(""), $(this).addClass("hidden")
            }), m.on("click", "li", function() {
                var e = $(this).data("id");
                $("#delete-gallery-item").data("id", e), $("#update-gallery-item").data("id", e);
                var t = $.parseJSON($("#gallery").val());
                "undefined" != typeof t[e] && $("#gallery-item-description").val(t[e].description), h.modal("show")
            }), h.on("click", "#delete-gallery-item", function(e) {
                e.preventDefault(), h.modal("hide");
                var t = $(this).data("id"),
                    a = m.find("li[data-id=" + $(this).data("id") + "]"),
                    l = $.parseJSON(u.val()),
                    s = [];
                $.each(l, function(e, a) {
                    e != t && s.push(a)
                }), u.val(JSON.stringify(s)), a.remove(), 0 == m.find("li").length && $(".reset-gallery").addClass("hidden")
            }), h.on("click", "#update-gallery-item", function(e) {
                e.preventDefault();
                var t = $(this).data("id"),
                    a = $("#gallery");
                h.modal("hide");
                var l = $.parseJSON(a.val());
                l[t].description = $("#gallery-item-description").val(), a.val(JSON.stringify(l))
            }), Botble.callScroll(m)
        }
    };
$(document).ready(function() {
    window.MediaGallery = window.MediaGallery || {}, Filesystem.bindActionToElement()
});