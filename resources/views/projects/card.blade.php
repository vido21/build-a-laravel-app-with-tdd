<div class="p-5 rounded shadow flex flex-col" style="background-color: white; height: 200px;">
    <h3 class="font-normal text-xl py-4 -ml-5 pl-4 mb-3"
        style="border-left: 5px solid blue;"
    >
        <a href="{{$project->path()}}"
            class="text-black no-underline"
        >
           {{$project->title}}
        </a>
    </h3>
    
    <div class="text-grey mb-4 flex-1">{{ str_limit($project->description, 100) }}</div>

    <footer>
        <form method="POST" action="{{ $project->path() }}" class="text-right">
            @method('DELETE')
            @csrf
            <button type="submit" class="text-xs">Delete</button>
        </form>
    </footer>
</div>

