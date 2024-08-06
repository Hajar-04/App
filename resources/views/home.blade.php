@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="main" data-user="{{ json_encode($user) }}"></div>
            </div>
            <div class="col-md-6"  Left>
                <svg id="chat-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z"/>
                </svg>
                <svg id="person-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                </svg>
                <svg id="plus-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <div id="search-results" class="search-results"></div>
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                    </svg>
                </div>
                <br>
                <input type="text" id="chat-search" class="search-input hidden" placeholder="Search in recent chats...">
                <input type="text" id="friend-search" class="search-input hidden" placeholder="Search in new friends...">
                <input type="text" id="friend-plus" class="search-input hidden" placeholder="Search in plus friends...">
</div>
            </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background-color: #f8f9fa; /* Light background color */
}

.message-input {
    flex: 1; /* Grow to fill space */
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 5px;
    margin-right: 10px;
}

.send-button {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.send-button:hover {
    background-color: #0056b3;
}


    .flex-container {
        display: flex;
        align-items: flex-start; /* Align items at the top of the container */
        gap: 0.1cm;
        background-color: #00008a;
        padding: 10px; /* Adjust padding as needed */
        margin-top: 25px;
        height: 80%;
    }

    .Left {

        flex-shrink: 0; /* Prevent the Left element from shrinking */
        display: flex;
        flex-direction: column; /* Align items vertically */
        align-items: flex-start; /* Align items to the left */
        color: white; /* Added color to make text visible */
    }

    .Left svg {
        cursor: pointer;
        color: white;
        margin-bottom: 15px;
    }

    .Left svg:hover {
        color: red;
    }

    .search-input {
        width: 200px;
        font-size: 16px;
        border: 1px solid white;
        border-radius: 4px;
        padding: 5px;
        margin-bottom: 10px;
        background-color: #00008a;
        color: white;
    }

    .hidden {
        display: none; /* Hide elements */
    }

    .Right {
        color: white; /* Text color */
        margin-left: 80px; /* Added margin for spacing */
        overflow-y: auto; /* Added overflow for scrolling */
        height: 100%; /* Fill the height */
        width: 950px;
        border: 1px solid red;
    }

    .search-results {
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: #fff;
        padding: 10px;
        max-height: 200px; /* Limit the height of the results container */
        overflow-y: auto; /* Add scroll if content exceeds height */
    }

    #search-results {
       /*  background-color: #0000; Match background color */
    }

    .user-result {
        display: flex;
        align-items: center;
        padding: 5px;
        border-bottom: 1px solid #ddd;
        cursor: pointer; /* Added cursor pointer */
    }

    .user-result:last-child {
        border-bottom: none;
    }

    .user-photo {
        border-radius: 50%;
        margin-right: 10px;
        width: 50px; /* Set width for consistency */
        height: 50px; /* Set height for consistency */
        object-fit: cover; /* Maintain aspect ratio */
    }
    .user-message {
    color: red;
    background-color: #00008a;
    border:1px solid black;
    border-radius:5px;
    height: 45px;
    width: 250px;

}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatIcon = document.getElementById('chat-icon');
    const personIcon = document.getElementById('person-icon');
    const plusIcon = document.getElementById('plus-icon');
    const chatSearch = document.getElementById('chat-search');
    const friendSearch = document.getElementById('friend-search');
    const friendPlusSearch = document.getElementById('friend-plus');
    const searchResults = document.getElementById('search-results');
    const chatBox = document.getElementById('main');
    let selectedUserId = null;

    function fetchUsers(query) {
        fetch(`/users?query=${query}`)
            .then(response => response.json())
            .then(data => {
                searchResults.innerHTML = '';
                data.forEach(user => {
                    const userElement = document.createElement('div');
                    userElement.classList.add('user-result');
                    userElement.dataset.userId = user.id;
                    userElement.innerHTML =
                        `<img src="/images/${user.photo}" alt="${user.name}" class="user-photo">
                        <div>
                            <span>${user.name}</span>
                        </div>`;
                    searchResults.appendChild(userElement);

                    userElement.addEventListener('click', () => {
                        selectedUserId = user.id;
                        chatBox.dataset.selectedUserId = user.id;
                        updateChatBoxWithSelectedUser(user.id);
                        history.pushState({ userId: user.id }, `Chat with ${user.name}`, `/chat/${user.id}`);
                    });
                });
            })
            .catch(error => console.error('Error fetching users:', error));
    }

    function fetchMessages(userId) {
        fetch(`/messages?userId=${userId}`)
            .then(response => response.json())
            .then(data => {
                const chatMessagesContainer = document.querySelector('.chat-messages');
                chatMessagesContainer.innerHTML = '';

                data.forEach(message => {
                    if (message.user_id === userId) {
                        const messageElement = document.createElement('div');
                        messageElement.classList.add('message');
                        if (message.user_id === selectedUserId) {
                            messageElement.classList.add('user-message');
                        }
                        messageElement.innerHTML = `<p>${message.text}</p>`;
                        chatMessagesContainer.appendChild(messageElement);
                    }
                });
            })
            .catch(error => console.error('Error fetching messages:', error));
    }

    chatIcon.addEventListener('click', () => {
        chatSearch.classList.remove('hidden');
        friendSearch.classList.add('hidden');
        friendPlusSearch.classList.add('hidden');
        history.pushState({ view: 'chat-search' }, 'Chat Search', '/chat-search');
    });
    function setupMessageSend() {
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');

    sendButton.addEventListener('click', function() {
        const messageText = messageInput.value.trim();
        if (messageText && selectedUserId) {
            fetch(`/send-message`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ userId: selectedUserId, text: messageText })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageInput.value = ''; // Clear the input field
                    fetchMessages(selectedUserId); // Refresh the chat messages
                } else {
                    console.error('Error sending message:', data.error);
                }
            })
            .catch(error => console.error('Error sending message:', error));
        }
    });

    messageInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendButton.click(); // Trigger the send button click on Enter key press
        }
    });
}



    personIcon.addEventListener('click', () => {
        friendSearch.classList.remove('hidden');
        chatSearch.classList.add('hidden');
        friendPlusSearch.classList.add('hidden');
        fetchUsers('new-friends');
        history.pushState({ view: 'friend-search'}, 'Friend Search', '/friend-search');
    });

    plusIcon.addEventListener('click', () => {
        friendPlusSearch.classList.remove('hidden');
        chatSearch.classList.add('hidden');
        friendSearch.classList.add('hidden');
        history.pushState({ view: 'friend-plus' }, 'Friend Plus', '/friend-plus');
    });

    friendSearch.addEventListener('input', function() {
        const query = friendSearch.value.trim();
        fetchUsers(query);
    });

    function updateChatBoxWithSelectedUser(userId) {
    const selectedUser = document.querySelector(`.user-result[data-user-id="${userId}"]`);
    if (!selectedUser) {
        console.error('Selected user not found:', userId);
        return;
    }

    const userName = selectedUser.querySelector('span').innerText;

    chatBox.innerHTML = '';

    const chatHeader = document.createElement('div');
    chatHeader.classList.add('card-header');
    chatHeader.innerHTML =
        `<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="chatHeader">
                        <p>${userName}</p>
                    </div>
                    <div class="card-body" style="height: 500px; width: 1277px; margin-top: 10px; overflow-y: auto;">
                        <div class="chat-messages"></div>
                    </div>
                    <div class="card-footer" style="height: 50px; width: 400px; margin-top: 10px; display: flex; align-items: center; justify-content: space-between;">
                        <input type="text" id="message-input" class="message-input" placeholder="Type your message...">
                        <button id="send-button" class="send-button">Send</button>
                    </div>
                </div>
            </div>
        </div>`;

    chatBox.appendChild(chatHeader);

    fetchMessages(userId);

    // Ensure that the input and button are available after adding them dynamically
    setupMessageSend();
}


});



</script>
