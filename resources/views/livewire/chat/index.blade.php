<div wire:poll.keep-alive>
  <span style="display:none">{{ $this->getMessages = App\Models\Chat::whereEmployeeId($this->employee_id)->get(); }}</span>
     <div class="mt-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4">
            <div class="flow-root bg-gray-50 p-5">
                <ul role="list" class="-mb-8" style="width:100%">
                  @foreach($this->getMessages as $message)
                    <li style="direction: rtl; width:75%; float:right" class="{{Auth::id() == $message->sender_id?'bg-indigo-400': 'bg-indigo-200'}}  shadow-lg p-2 mb-4 rounded-md text-white">
                        <div class="relative pb-8 p-2" align="right">
                        <div class="relative flex items-start space-x-3 pt-1">
                            <div class="relative">
                            <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">

                            <span class="absolute -bottom-0.5 -left-1 bg-white rounded-tl px-0.5 py-px">
                                <!-- Heroicon name: solid/chat-alt -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            </div>
                            <div class="min-w-0 flex-1">
                            <div class="mx-3">
                                <div class="text-sm">
                                <a href="#" class="font-medium text-black font-bold">{{$message->sender->name}}</a>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500 font-bold">{{$message->created_at}}</p>
                            </div>
                            <div class="mt-3 mx-3 text-sm {{Auth::id() == $message->sender_id?'text-gray-200': 'text-gray-500'}}">
                                <p>{{$message->message}}</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </li>
                  @endforeach
                </ul>
            </div>
            <div class="flex items-start space-x-4 mt-4">
                <div class="flex-shrink-0">
                  <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="min-w-0 flex-1">
                  <form wire:submit.prevent="sendMessage">
                    <div class="border-b border-gray-200 focus-within:border-indigo-600">
                      <label for="comment" class="sr-only">Add your comment</label>
                      <textarea rows="3" name="comment" wire:model="message" id="comment" class="block w-full border-0 border-b border-transparent p-0 pb-2 resize-none focus:ring-0 focus:border-indigo-600 sm:text-sm" placeholder="Add your comment..."></textarea>
                    </div>
                    <div class="pt-2 flex justify-between">
                      <div class="flex-shrink-0">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
