<div class="p-5 rounded shadow" style="background-color: white; height: 200px;">
    <h3 class="font-normal text-xl py-4 -ml-5 pl-4 mb-3"
        style="border-left: 5px solid blue;"
    >
        <a href="{{$project->path()}}"
            class="text-black no-underline"
        >
           {{$project->title}}
        </a>
    </h3>
    
    <div style="color: grey">{{str_limit($project->description,80)}}</div>
</div>

