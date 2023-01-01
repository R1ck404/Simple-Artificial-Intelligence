<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- <div class="header-left">
    </div> -->
    <div class="board">
        <header class="board-header">
            <h1><b>S</b>imple
                <b>A</b>rtificial <b>I</b>ntelligence
            </h1>
        </header>

        <main class="board-main">
            <div class="messages">
                <div class="message">
                    <div class="text"><img style="vertical-align:middle; margin-right: 15px;margin-bottom: 0.3em;"
                            src="./icons/artificial_intelligence.png" alt="ai"> Hi, i am an <b>S</b>imple
                        <b>A</b>rtificial <b>I</b>ntelligence. How can i help you today?
                    </div>
                </div>
            </div>
        </main>

        <aside class="board-text">
            <form action="#" class="form">
                <div class="form-container">
                    <input type="text" placeholder="Type in…" aria-label="Write your message" id="question"
                        name="question">

                    <button type="submit" title="Send">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <span class="sr-only">></span>
                    </button>
                </div>
            </form>
        </aside>
    </div>
</body>

<script>
function rateResponse(params) {

}

document.querySelector(".form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from refreshing the page

    // Get the value of the input field
    var input = document.getElementById("question").value;

    // Make a request to the PHP script using the value of the input field as a parameter
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "AI.php?input=" + input, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            var board = new Board();
            board.createFunctionMessage(xhr.responseText);
        }
    };
    xhr.send();
});
</script>

</html>

<script>
class Board {
    constructor() {
        this.messages = document.querySelector('.messages')
        this.addButton = document.querySelector('.add-message')
        this.textForm = document.querySelector('.form')
        this.srOnly = document.querySelector('.sr-only')
        this.preventDefault = false;

        this.sendTextFieldEvent()
    }

    sendTextFieldEvent() {
        const text = this.textForm.querySelector('input')

        this.textForm.addEventListener('submit', event => {
            event.preventDefault()

            if (text.value !== '' && !this.preventDefault) {
                this.preventDefault = true;
                this.srOnly.innerHTML = 'Waiting...';
                this.createMessage(text.value, true)
                text.value = ''
            } else {
                this.textForm.style.color = 'red';
            }
        })
    }

    createFunctionMessage(text) {
        this.createLoad()
        setTimeout(() => {
            this.removeLoad()
            this.createMessage(text)
        }, 500);
    }

    createMessage(text, isMe = false) {
        const message = document.createElement('div')
        message.textContent = text
        message.classList.add('message')
        message.classList.toggle('me', isMe)

        if (isMe) {
            message.innerHTML = `<img style="vertical-align:middle; margin-right: 15px;"
                            src="./icons/user.png" alt="user">` + message.innerHTML;
        } else {
            /*message.innerHTML = message.innerHTML + `<div class="rating">
                        <!-- Thumbs up -->
                        <div class="like grow">
                            <i aria-hidden="true">👍</i>
                        </div>
                        <!-- Thumbs down -->
                        <div class="dislike grow">
                            <i aria-hidden="true">👎</i>
                        </div>
                    </div>`;*/ //we dont have ratings yet
            message.innerHTML = `<img style="width: 32px; height: 32px; vertical-align:middle; margin-right: 15px;"
                            src="./icons/artificial_intelligence.png" alt="ai">` + message.innerHTML;
        }

        this.messages.append(message)
        message.scrollIntoView()
    }

    createLoad() {
        const loader = document.createElement('div')
        loader.classList.add('message')
        loader.textContent = 'AI is typing…'
        loader.classList.add('loader')
        this.messages.append(loader)
    }

    removeLoad() {
        const loader = this.messages.querySelector('.loader')
        if (loader) {
            this.messages.removeChild(loader)
            this.textForm.style.color = 'white';
            this.srOnly.innerHTML = 'Send';
            this.preventDefault = false;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new Board()
})
</script>