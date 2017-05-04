<div id="ModuleListViewTABcontainer">
  <!---MODULE LIST VIEW START--->
  <form method="POST">
    {!! csrf_field() !!}
    <button type="submit" name="button">Edit</button>
    <button type="submit" name="button" formaction="/moduleDelete">Delete</button>
    <div class="moduleListcontainer" id="moduleListcontainer">
      @foreach($modules as $m)
      <div class="QuizListCell">
          <div class="QuizListCellSelect" id="ModuleListCellName">
              <input type="radio" name="ModID" value="{{$m->ModuleID}}" id="ModuleListItem" />
          </div>
          <div class="QuizListCellName" id="ModuleListSelect">
              <h3>{{$m->ModuleName}}</h3>
          </div>
          <div class="QuizListCellActive">
            {{$m->Active}}
          </div>
      </div>
      @endforeach
    </div>
</div>
</form>
<!---MOBILE LIST VIEW END--->
</div>
