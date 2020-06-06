@extends('template_backend.home')
@section('sub-judul','Post yang sudah di hapus')
@section('content')

@if(Session::has('success'))
 <div class="alert alert-success" role="alert">{{Session('success')}}</div>
@endif

<br><br>
   <table class="table table-striped table-hover table-sm table-bordered ">       
       <thead>
           <tr>
               <th>No</th>
               <th> Nama Judul </th>
               <th> category </th>
               <th> Tag </th>
               <th> gambar </th>
               <th> Action </th>
            </tr>
       </thead>
        <tbody>
            <tr>
                @foreach($post as $result=>$hasil)
            <td>{{$result + $post->firstitem()}}</td>
            <td>{{$hasil->judul}}</td>
            <td>{{$hasil->category->name}}</td>
            <td>@foreach($hasil->tags as $tag)
                <ul>
                    <li> {{$tag->name}} </li>
                </ul>
                
                @endforeach
            </td>
            <td><img src="{{asset($hasil->gambar)}}" class="img-fluid" style="width:50px"></td>
            <td>
                <form action="{{route('post.kill',$hasil->id)}}" method="post">
                    @csrf
                    @method('delete')
                <a href="{{route('post.restore',$hasil->id)}}" class="btn btn-info btn-sm">Restore</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
             @endforeach
        </tbody>      
    </table>
    {{$post->links()}}
@endsection