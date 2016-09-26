var App = React.createClass({
    render: function(){
      return (
        <div>
            <SearchBox />
        </div>
      );
    }
});

var SearchBox = React.createClass({
    render: function(){
      return (
        <div>
            <span style={{textAlign:"center"}}><h2>Pick a book...</h2></span>
        <div className="row search">
                        <div className="input-group col-xs-8 col-xs-offset-2">
                            <input type="text" id="inputSearch"className="form-control" x-webkit-speech placeholder="Titles or Authors..." />

                            <div className="input-group-btn">
                                <button type="button" id="btnSearch" class="btn btn-search btn-primary" onclick="voiceSearch()">
                                    <span className="fa fa-microphone"></span>
                                    <span className="label-icon">Say it ...</span>
                                </button>
                            </div>
                        </div>
                        <div className='list-group ' id="result" style="width: 780px;margin: 0 auto;">
                        </div>
        </div>
      </div>
      );
    }
});


ReactDOM.render(<App />, document.getElementById("content"));
