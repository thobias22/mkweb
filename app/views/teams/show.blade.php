@extends('v1-wrapper')

@if(isset($team))

    @section('title')
        Lagsida för {{$team->name}}
    @stop

    @section('contentname')
        Lag
    @stop

    @section('contenttitle')
        {{$team->name}}
        @if(Auth::check() && (Auth::user()->nickname == $team->leader || Auth::user()->crew()))
                {{ link_to_route('teams.edit',' [Redigera]',$team->name) }}
        @endif
    @stop

    @section('content')
        {{Session::get('message')}}
        
        <div>
            <p><img src="{{$team->imageurl}}" alt="avatar" height="160" width="160"></p>
            <h3>{{$team->name}}</h3>
            @if(Auth::check() && (Auth::user()->nickname == $team->leader || Auth::user()->crew()))
                {{ link_to_route('teams.edit','Redigera ditt lag',$team->name) }}
                <br />
            @endif
            <br>
                <table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Lagnamn:</td>
                        <td><i class="icon-home"></i> {{{$team->name}}}</td>
                    </tr>
                    
                    <tr>
                        <td>Motto:</td>
                        <td><i class=""></i> {{{$team->motto}}}</td>
                    </tr>
                    <tr>
                        <td>Lagledare:</td>
                        <td><i class=""></i>{{{$team->leader}}}</td>
                    </tr>
                    <tr>
                        <td>Medlemmar:</td>
                        <td><i class=""></i>
                        @if(!empty($team->members))
                            @foreach($team->members as $member)
                                {{ $member }}, 
                            @endforeach
                        @else
                            Det finns inga medlemmar!
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Turneringar:</td>
                        <td><i class=""></i>TODO</td>
                    </tr>
                    </tbody>
                </table>
            
            @if(Auth::check() && (Auth::user()->nickname == $team->leader || Auth::user()->crew()))
                {{ link_to('/teams/'.$team->name.'/addmember','Lägg till lagkamrater'); }}
                <br />
                {{ link_to('/teams/'.$team->name.'/removemember','Ta bort lagkamrater'); }}
            @endif
            
        </div>
    @stop

@else

    @section('title')
        Laget finns inte
    @stop

    @section('contentname')
        Lag
    @stop

    @section('contenttitle')
        Finns inte
    @stop

    @section('content')
        Laget du sökte kunde inte hittas
    @stop
    
@endif
