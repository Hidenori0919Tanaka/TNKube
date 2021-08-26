<h1>Home</h1>

@foreach ($videoList as $video)
                    <div class="content__body__videos">
                        <p>
                            {{ $video->title }}
                        </p>
                    </div>
                @endforeach