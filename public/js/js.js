var searchRequest              = null;
var minlength                  = 3;
var delayTimer;
var result                     = '';
var value                      = '';
var i =0;

function callAjaxBook(value){
  $.ajax({
    type: "GET",
    url: "http://book.app/seeder/data.json",
//  url: "https://www.googleapis.com/books/v1/volumes?q=" + value + "&key=AIzaSyCp78_hIsVtXn7_LwnZMWM53yqOS8Yiyqg",
    cache: false,
    dataType: "json",
    beforeSend:function(){
      $('#result').html('<div style="padding-top: 50px; text-align: center;"><img src="/img/icon/loading1.png" width="50px" style="text-align: center"></div>');
    },
    success: function(data){

        for (i = 0; i < data.items.length; i++){
          result += '<div id="'+data.items[i].id+'"> ';
          result += "<div class=\"list-group-item list-group-item-action list-group-item-info\" style='margin-top: 10px;'>";
          result += '<div class="paragraphs" style="padding-left: 10px;">';
          result += '<div class="row">';
          result += '<div class="span4"> ';
          if (data.items[i].volumeInfo.hasOwnProperty('imageLinks')) result += '<img id="imageLink" style="float:left; margin-right : 10px;" class="img-thumbnail" src="'+ data.items[i].volumeInfo.imageLinks.smallThumbnail+'" width="100px"/>';
          result += '<img src="" style="float:left">';
          result += '<div class="content-heading" id="title" ><h5><strong>'+data.items[i].volumeInfo.title+' </strong></h5></div>';
          result += '<strong>Authors : </strong><span id="author">'+data.items[i].volumeInfo.authors+'</span><br>';
          result += '<strong>Published Date : </strong><span id="publishDate">'+data.items[i].volumeInfo.publishedDate+'</span><br>';
          result += '<span><strong>Links: </strong>';
          result += '<a href="'+data.items[i].volumeInfo.previewLink+'" target="_blank" id="google_link_preview"><img src="/img/icon/book.png" width="15" /></a> - ';
          result += '<a href="'+data.items[i].volumeInfo.infoLink+'" target="_blank" id="google_link_info"><img src="/img/icon/google.png" width="15" /></a> - ';
          result += '<a href="#" target="_blank"><img src="/img/icon/amazon.ico" width="17" /></a> - ';
          result += '<a href="https://en.wikipedia.org/wiki/'+data.items[i].volumeInfo.title+'" target="_blank"><img src="/img/icon/wiki.png" width="15" /></a>';
          // if (data.items[i].volumeInfo.hasOwnProperty('industryIdentifiers'))
          // if (data.items[i].volumeInfo.industryIdentifiers.type        == 'ISBN_13') result += '<a href="https://www.amazon.com/gp/search/ref=sr_adv_b/?search-alias=stripbooks&unfiltered=1&field-keywords=&field-author=&field-title=&field-isbn=' +data.items[i].volumeInfo.industryIdentifiers.identifier+'&field-publisher=&node=&field-p_n_condition-type=&p_n_feature_browse-bin=&field-age_range=&field-language=&field-dateop=During&field-datemod=&field-dateyear=&sort=relevanceexprank&Adv-Srch-Books-Submit.x=18&Adv-Srch-Books-Submit.y=15" target="_blank">Amazon </a>';

          result += '</span><br>';
          result += '<button onclick="sendBooks(\''+data.items[i].id+'\')" type="submit" class="btn btn-success btn-xs">Save</button> <button type="submit" class="btn btn-danger btn-xs">Suggestion</button>';

          result += '<div style="clear:both"></div> <div id="description"><strong>Description: </strong><span>'+data.items[i].volumeInfo.description+'</span></div></div></div></div>';
          result += "</div>";
          result += "</div>"

        }
        $("#result").html(result).contents();

    },
    error:function(){

      $("#result").html('<div style="text-align: center"><p class="error"><strong>Oops!</strong> Try that again in a few moments.</p></div>');
    }
  });

}


function sendBooks(id){
var jsonObject  = new Object();
jsonObject.google_id = id;
jsonObject.title = $('#'+id+' #title').text();
jsonObject.author = $('#'+id+' #author').text();
jsonObject.publishDate = $('#'+id+' #publishDate').text();
jsonObject.google_link_info = $('#'+id+' #google_link_info').attr('href');
jsonObject.google_link_preview = $('#'+id+' #google_link_preview').attr('href');
jsonObject.imageLink = $('#'+id+' #imageLink').attr('src');
jsonObject.description = $('#'+id+' #description span').text();
var bookJsonObject = JSON.stringify(jsonObject);

$.ajax({
  url: '/books/create',
  type: 'post',
  data: bookJsonObject,
  dataType : 'json',
  beforeSend: function (xhr) {
        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    },
      success: function (data) {
        if (data.status == 'success') {
                    console.log(data.msg);
                } else {
                    console.log(data.msg);
                }
      },
      error: function (data) {
          // Error while calling the controller (HTTP Response Code different as 200 OK
          console.log('Error:');
      }
});

}



function voiceSearch() {
  $('#inputSearch').val('');
  $("#result").hide();
  if (window.hasOwnProperty('webkitSpeechRecognition')) {

    var recognition = new webkitSpeechRecognition();

    recognition.continuous    = false;
    recognition.interimResults    = false;

    recognition.lang   = "en-US";
    recognition.start();

    recognition.onresult = function(e) {
      $('#inputSearch').val(e.results[0][0].transcript);
      value    = '';
      result  = '';
     $("#result").show();
      value= e.results[0][0].transcript;
      callAjaxBook(value);

      recognition.stop();

    };

    recognition.onerror = function(e) {
      recognition.stop();
    }

  }else {
    alert('Your browser does not support HTML5/WebKitSpeech. You are not able to use this functionality');
  }

}



function showSuggestionModal(id){
  $('#suggestionModal .modal-body').attr('id',id);
  $('#suggestionModal').modal('show');

}
function submitBookSuggestion(){
var jsonObject = new Object();
jsonObject.book_id = $('#suggestionModal .modal-body').attr('id');
jsonObject.reason = $('#suggestionModal .modal-body .form-group textarea#suggestion').val();
jsonObject.rating = $('input[name="myradio"]:checked', '#suggestionModal .modal-body').val();
var suggestionJsonObject = JSON.stringify(jsonObject);
$.ajax({
  url: '/user/suggestions/create',
  type: 'post',
  data: suggestionJsonObject,
  dataType : 'json',
  beforeSend: function (xhr) {
        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    },
      success: function (data) {
        if (data.status == 'success') {
                    console.log(data.msg);
                } else {
                    console.log(data.msg);
                }
      },
      error: function (data) {
          // Error while calling the controller (HTTP Response Code different as 200 OK
          console.log('Error:');
      }
});


}

function deleteSuggestion(id){
  $.ajax({
    url: '/user/suggestions/delete/'+id,
    type: 'get',
    beforeSend: function(){

    },
    success: function(data){
      $("#suggestionList").load(location.href + " #suggestionList");

    },
    error: function(){

    }
  });
}

/** MAIN FUNCTION **/

$(document).ready(function(){
  clearTimeout(delayTimer);

  $("#inputSearch").keyup(function (e) {
    e.preventDefault();
    value = $(this).val();
    result  = '';
    if (value.length >= minlength ) {
      $("#result").show();
      if (searchRequest != null) searchRequest.abort();
      delayTimer = setTimeout(function () {
        searchRequest = callAjaxBook(value);
      },50);}
      else {$("#result").hide();}
    });


  });
