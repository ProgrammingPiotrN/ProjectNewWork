<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.dashboard.header')

<div class="container mx-auto mt-8 mb-8"> <!-- Dodaj marginesy na górze i na dole -->
    <div id="chat" class="flex flex-col h-screen">
        <div id="messages" class="overflow-y-auto flex-1">
            @foreach($messages as $message)
                <div class="flex items-start mb-4">
                    <img src="{{ asset('storage/user_photo/' . $message->user->user_photo) }}" alt="{{ $message->user->name }}" class="w-8 h-8 rounded-full mr-4 border border-gray-300">
                    <div>
                        <div class="bg-gray-200 p-4 rounded-lg">
                            <p class="text-sm text-gray-800 font-semibold">{{ optional($message->user)->name }}</p>
                            <p class="text-gray-900">{{ $message->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <form id="message-form" action="{{ route('chat.store') }}" method="POST" class="flex">
            @csrf
            <input type="text" name="content" id="content" class="flex-1 p-4 bg-gray-200 rounded-full" placeholder="Type your message...">
            <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
        </form>
    </div>
</div>

@include('includes.footer')





@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function updateMessages(messages) {
            var html = '';
            messages.forEach(function(message) {
                html += '<div><strong>' + message.user.name + ':</strong> ' + message.content + '</div>';
            });
            document.getElementById('messages').innerHTML = html;
        }

        window.onload = function() {
            var chat = document.getElementById('chat');
            var messageForm = document.getElementById('message-form');
            var contentInput = document.getElementById('content');

            messageForm.onsubmit = function(e) {
                e.preventDefault();
                axios.post(messageForm.action, {
                    content: contentInput.value
                })
                .then(function(response) {
                    contentInput.value = '';
                    updateMessages(response.data);
                })
                .catch(function(error) {
                    console.error(error);
                });
            };

            axios.get('{{ route("chat.index") }}')
                .then(function(response) {
                    updateMessages(response.data);
                })
                .catch(function(error) {
                    console.error(error);
                });
        };
    </script>
@endpush
