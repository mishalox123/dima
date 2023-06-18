// Get chatbot elements
const chatbot = document.getElementById('chatbot');
const conversation = document.getElementById('conversation');
const inputForm = document.getElementById('input-form');
const inputField = document.getElementById('input-field');

addHelpMessage();
// Add event listener to input form
inputForm.addEventListener('submit', function(event) {
    // Prevent form submission
    event.preventDefault();
    addHelpMessage();
    // Get user input
    const input = inputField.value;

    // Clear input field
    inputField.value = '';
    const currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: "2-digit" });

    // Add user input to conversation
    let message = document.createElement('div');
    message.classList.add('chatbot-message', 'user-message');
    message.innerHTML = `<p class="chatbot-text" sentTime="${currentTime}">${input}</p>`;
    conversation.appendChild(message);
    console.log(input);
    // Generate chatbot response
    const response = generateMessage(input);

    // Add chatbot response to conversation
    message = document.createElement('div');
    message.classList.add('chatbot-message','chatbot');
    message.innerHTML = `<p class="chatbot-text" sentTime="${currentTime}">${response}</p>`;
    conversation.appendChild(message);
    message.scrollIntoView({behavior: "smooth"});
});

//сообщения
function generateMessage(input) {
    const message = new Map([
        ['test' , 'testtest'],
        ['test2' , 'Нееа вневшаша а агнан нпнн аннаеа паан нпннаеашеаеангпе6кнег66еп 6п6е ']

    ]);

    return message.get(input);
}

function help_message(text){
    inputField.value = text;
}
//подсказки
function addHelpMessage(){
    const help_message = ['test','test2'];
    help_message.forEach((item) => {
        message = document.createElement('div');
        message.classList.add('chatbot-message','user-message');
        message.innerHTML = ` <a class="chatbot-text-help" onclick="help_message(`+`'${item}'`+`)"> ` +
            `${item}
            </a>`

        conversation.appendChild(message);
        message.scrollIntoView({behavior: "smooth"});
    });
}

