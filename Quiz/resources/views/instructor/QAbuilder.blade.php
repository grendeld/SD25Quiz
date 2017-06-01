  <div class="QuestionbuildContainer" id="QuestionbuildContainer">
    <h3>Create Question Set</h3>
    <!---QUESTIONSET SECTION START--->
    <form class="" action="index.html" method="post">
    <div class="Question">
      <p>Enter Your Question Below</p>
      <textarea cols="50" row="5" placeholder="Question"></textarea>
    </div>
    <!---QUESTIONSET SECTION END--->
    <!---ANSWERSET SECTION START--->
        <style>
            ol#list{
                display:inline;
                
            }
        ol#list li{
    list-style: none;
            margin-top: 5px;
height: 4em;
width: 100%;
float: left;
    counter-increment: myIndex;
            
}

ol#list li:before{
    content:counter(myIndex,upper-alpha)" ";
    font-size: 1.75rem;
    margin-bottom: 0.5rem;
font-family: inherit;
font-weight: 500;
line-height: 1.1;
color: inherit;

}
        </style>
    <div>
        <ol id="list">
					<li>
						<input type="text" name="Answer[]" oninput='loader(this)' placeholder="First Option"/>
                    </li>
        </ol>
        </div>
        <script>
			var list = document.getElementById('list');
			function loader(textBox){
                if(!list){
                    var list = document.getElementById('list');
                }
                textBox.oninput = null;
                list.appendChild(createItem());
                var q = [document.createElement('button'),
                        document.createElement('input')];
                q[0].setAttribute('class','btn btn-danger btn-sm');
                q[0].innerHTML="Delete";
                q[0].setAttribute('onclick','del(this)');
                q[1].setAttribute('type','radio');
                q[1].setAttribute('name','radio');
                var par = textBox.parentElement;
                par.insertBefore(q[1],textBox);
                par.appendChild(q[0]);
			}
            function createItem(){
                var item = document.createElement('li');
                var q = document.createElement('input');
                q.setAttribute('type','text');
                q.setAttribute('name','Answer[]');
                q.setAttribute('oninput','loader(this)');
                q.setAttribute('placeholder','Next Option');
                item.appendChild(q);
                return item;
            }
            function del(check){
                var li = check.parentElement;
                var ul = li.parentElement;
                li.parentElement.removeChild(li);
            }
            function sub(){
                var radio = document.getElementsByName('radio');
                for(rad in radio){
                    if(radio[rad].checked == true)
                        {
                            radio[rad].value = rad;
                            break;
                        }
                }
                var par = radio[0].parentElement.parentElement;
                par.removeChild(par.lastElementChild);
            }
            //createItem();
		</script>
    <!---ANSWERSET SECTION END--->
    <!---CORRECTANSWERSET SECTION START--->
    <div class="AnswerSet">
      <div class="AnswerNumber"><p>Enter Correct Answer Option Here</p></div>
      <div class="AnswerTextInput">
        <input type="text" placeholder="correct answer" style="width:150px; margin-right:20px;" id="correctAnswer"/>
      </div>
        <input type="Button" value="Next Q&A" id="enterQuestion"
        onclick="javascript: QnASetView();"/>
    </div>

    <!---CORRECTANSWERSET SECTION END--->
  </div>
