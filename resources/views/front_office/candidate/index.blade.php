@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/candidate.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        @foreach($candidates as $candidate)
            <div class="row mx-4">
                <div class="offset-md-2 col-md-8">

                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <a href="{{ $link = route('candidat.show',['id' => $candidate->slug]) }}">
                                    <img alt="{{ $candidate->name }} image"
                                         src="{{ $candidate->pictureUrl() }}" class="candidate-img img-fluid card-img">
                                </a>

                                <!--<img src="..." class="card-img" alt="...">-->
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class=" card-title row">

                                        <div class="col-md-8">
                                            <a href="{{ $link }}">
                                                <h2>
                                                    {{ $candidate->name }}
                                                </h2>
                                            </a>

                                        </div>

                                        <div class="col-md-4">
                                            <!--claping btn-->
                                            <div class="float-right" style="height: 50px;">
                                                <img class="clap-hand"
                                                     src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjk3LjIyMSAyOTcuMjIxIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAyOTcuMjIxIDI5Ny4yMjE7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiI+PGc+PGc+Cgk8cGF0aCBkPSJNMjgzLjc2MiwzMi44MzVjMi43MDUtMS45MTMsMy4zNDYtNS42NTgsMS40MzItOC4zNjNjLTEuOTE0LTIuNzA1LTUuNjU3LTMuMzQ3LTguMzYzLTEuNDMybC0xNC45ODQsMTAuNjAyICAgYy0yLjcwNSwxLjkxMy0zLjM0Niw1LjY1OC0xLjQzMiw4LjM2M2MxLjE2OSwxLjY1MiwzLjAyMiwyLjUzNSw0LjkwMiwyLjUzNWMxLjE5OCwwLDIuNDA4LTAuMzU4LDMuNDYxLTEuMTA0TDI4My43NjIsMzIuODM1eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojMzNFQjQwIiBkYXRhLW9sZF9jb2xvcj0iIzMzZWI0MCI+PC9wYXRoPgoJPHBhdGggZD0iTTI0NC4wNjQsMjkuMzg3YzAuNjk1LDAuMjYyLDEuNDA5LDAuMzg2LDIuMTEsMC4zODZjMi40MjgsMCw0LjcxMy0xLjQ4NCw1LjYxNy0zLjg5MWw2LjQ2LTE3LjE4MiAgIGMxLjE2Ni0zLjEwMS0wLjQwMy02LjU2MS0zLjUwNS03LjcyN2MtMy4xMDEtMS4xNjctNi41NjIsMC40MDQtNy43MjgsMy41MDVsLTYuNDYsMTcuMTgyICAgQzIzOS4zOTMsMjQuNzYxLDI0MC45NjIsMjguMjIxLDI0NC4wNjQsMjkuMzg3eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojMzNFQjQwIiBkYXRhLW9sZF9jb2xvcj0iIzMzZWI0MCI+PC9wYXRoPgoJPHBhdGggZD0iTTI5MS4yMjMsNTUuNjExYy0wLjA0MSwwLTAuMDgyLDAtMC4xMjQsMGwtMTguMzUxLDAuMTU0Yy0zLjMxMywwLjA2Ny01Ljk0NCwyLjYwNS01Ljg3Nyw1LjkxOCAgIGMwLjA2NiwzLjI3MSwyLjczOSw1LjkyOCw1Ljk5Nyw1LjkyOGMwLjA0MSwwLDAuMDgyLDAsMC4xMjQsMGwxOC4zNTEtMC4zMTNjMy4zMTMtMC4wNjgsNS45NDQtMi43MzIsNS44NzctNi4wNDUgICBDMjk3LjE1NCw1Ny45ODIsMjk0LjQ4MSw1NS42MTEsMjkxLjIyMyw1NS42MTF6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiMzM0VCNDAiIGRhdGEtb2xkX2NvbG9yPSIjMzNlYjQwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjU0LjIsMTQ3LjE1NGMtMy4wNzMtMi40MzMtNi43MTEtNC4wODktMTAuNTU3LTQuODY3YzAuMjU0LTAuNDYsMC40OTEtMC45MjgsMC43MTUtMS40MDNsMi40MDgtMi40MDggICBjOS4yNzQtOS4yNzUsMTAuMjQ4LTIzLjg3NCwyLjI2NC0zMy45NjFjLTMuNzY5LTQuNzYxLTkuMDAxLTcuOTI1LTE0LjgxMi05LjEwNmMwLjQxNS0wLjc2NCwwLjc4My0xLjU0NSwxLjExNy0yLjMzOCAgIGM2LjMxNi05LjE0OSw2LjIxMy0yMS40NDUtMC43ODItMzAuMjgzYy0zLjc3LTQuNzY0LTkuMDA0LTcuOTM4LTE0LjgxOC05LjExN2M0LjgtOC44MjYsNC4xODctMTkuODI2LTIuMjI1LTI3LjkyNSAgIGMtNC44NDgtNi4xMjUtMTIuMTA5LTkuNjM5LTE5LjkyMy05LjYzOWMtNi4yNTcsMC0xMi4xNiwyLjIzNi0xNi43OTIsNi4zM2MtMC43MDEtMy45NzktMi4zNjMtNy44MjItNS4wMTItMTEuMTY5ICAgYy00Ljg0OS02LjEyNS0xMi4xMS05LjYzOC0xOS45MjQtOS42MzlsMCwwYy02Ljc5LDAtMTMuMTY0LDIuNjM1LTE3Ljk0Nyw3LjQxOGwtNjAuODQsNjAuODRsLTAuMjMyLTguMTIgICBjLTAuMTA3LTEzLjgzLTExLjM5Mi0yNS4wNDktMjUuMjQ3LTI1LjA0OWMtMTMuNjA0LDAtMjQuNzI5LDEwLjgxNS0yNS4yMjksMjQuMjk4bC0xMi4xNDYsODguMzA2bC05Ljk4MywxMS42MDQgICBjLTUuOTgzLDYuOTU3LTUuNTgyLDE3LjQ4MSwwLjkxNSwyMy45NjJMMTkuOTg3LDE5OS43Yy00LjU3NCw2Ljg4MS0zLjc3MywxNi4yNjYsMi4yMDYsMjIuMjNsNjkuNjY3LDY5LjU1NyAgIGMzLjMyOSwzLjMyMSw3Ljc0OCw1LjE0OCwxMi40NDYsNS4xNDhjMy44NTcsMCw3LjY2OC0xLjI5NSwxMC43MjktMy42NDVsMTQuNTQ0LTExLjE2OGMxMy45OTEtMy4zMDUsMjkuNDE2LTEwLjgxMyw0NS44NzQtMjIuMzMgICBjMTQuMzcxLTEwLjA1OCwyOS45NjItMjMuNDYsNDYuMzM3LTM5LjgzNmwzNC42MzEtMzQuNjMxYzUuMTA3LTUuMTA3LDcuNzk1LTEyLjE4OCw3LjM3NS0xOS40MjcgICBDMjYzLjM3NiwxNTguMzcxLDI1OS44NzksMTUxLjY0OSwyNTQuMiwxNDcuMTU0eiBNMTg4LjEyNCwzMi4wMDljMi42MDMtMi42MDIsNi4wMzItMy45MDMsOS40NjItMy45MDMgICBjMy45MTUsMCw3LjgzMSwxLjY5NSwxMC41MTUsNS4wODZjNC4yNTYsNS4zNzcsMy41MSwxMy4xOC0xLjMzOSwxOC4wMjhsLTYuMTc3LDYuMTc2Yy0wLjk1MiwwLjYzNS0xLjg3OSwxLjMxNC0yLjc0NywyLjA4MyAgIGMtMC43MDEtMy45OC0yLjM2NC03LjgyMy01LjAxMy0xMS4xNjljLTMuMjU3LTQuMTE0LTcuNjA0LTcuMDQzLTEyLjQ3NS04LjUyN0wxODguMTI0LDMyLjAwOXogTTE0Ni4zOTcsMTcuNTMyICAgYzIuNjAyLTIuNjAyLDYuMDMyLTMuOTAzLDkuNDYyLTMuOTAzYzMuOTE2LDAuMDAxLDcuODMxLDEuNjk2LDEwLjUxNSw1LjA4N2M0LjI1Niw1LjM3NywzLjUxLDEzLjE3OS0xLjMzOSwxOC4wMjdsLTcwLjkxOSw3MC4xODYgICBsLTAuMjMzLTguMTE5Yy0wLjA2MS03LjgyNS0zLjctMTQuODEyLTkuMzU2LTE5LjQwNUwxNDYuMzk3LDE3LjUzMnogTTEzLjYyNCwxNzYuMzkxYy0yLjA4Mi0yLjA3OC0yLjIwOS01LjQxLTAuMjkxLTcuNjQgICBsMTIuMjgxLTE0LjI3N2MwLjAwNi0wLjAwNywwLjAxMS0wLjAxNywwLjAxMi0wLjAyNmwxMi43Mi05Mi40ODNjMC03LjI4Niw1Ljk2MS0xMy4yNDcsMTMuMjQ3LTEzLjI0NyAgIGM3LjI4NiwwLDEzLjI0OCw1Ljk2MSwxMy4yNDgsMTMuMjQ3TDY1LjE4Niw3NGMtMTEuOTg4LDEuNjQ2LTIxLjMyMiwxMS43MzMtMjEuNzgsMjQuMDU3bC0xMi4xNDUsODguMzA3bC0zLjUzMyw0LjEwOCAgIEwxMy42MjQsMTc2LjM5MXogTTI0Ny45MzUsMTc2LjUzOWwtMzQuNjMsMzQuNjMxYy0yOS41NzcsMjkuNTc3LTYwLjQ5NCw1My4zMTgtODcuNjUzLDU5LjIzNyAgIGMtMC44MjUsMC4xODEtMS42MDEsMC41MjgtMi4yNzEsMS4wNDNsLTE1LjY1NSwxMi4wMjJjLTEuMDE0LDAuNzc5LTIuMjE5LDEuMTYyLTMuNDE5LDEuMTYyYy0xLjQ0MywwLTIuODgtMC41NTUtMy45NjgtMS42NDEgICBsLTY5LjY3MS02OS41NmMtMi4wODMtMi4wNzctMi4yMS01LjQwOS0wLjI5MS03LjY0bDEyLjI4LTE0LjI3NmMwLjAwNy0wLjAwOCwwLjAxMS0wLjAxNywwLjAxMy0wLjAyNmwxMi43MTktOTIuNDgzICAgYzAtNy4yODYsNS45NjItMTMuMjQ4LDEzLjI0OC0xMy4yNDhjNy4yODYsMCwxMy4yNDcsNS45NjIsMTMuMjQ3LDEzLjI0OGwwLjYyNiwyMS44MjRjMC4xMDQsMy42MjYsMy4wODcsNS45ODcsNi4xOTEsNS45ODcgICBjMS41MTQsMCwzLjA1OC0wLjU2Myw0LjMwOS0xLjgxM2w3MC40MzEtNzAuNDMxYzIuNjAzLTIuNjAzLDYuMDMxLTMuOTAzLDkuNDYyLTMuOTAzYzMuOTE1LDAsNy44MzEsMS42OTUsMTAuNTE1LDUuMDg2ICAgYzQuMjU2LDUuMzc3LDMuNTA5LDEzLjE4LTEuMzQsMTguMDI4bC00OC41MTgsNDguNTE4Yy0yLjUxOSwyLjUyLTIuNTE5LDYuNjAzLDAsOS4xMjFsMCwwYzEuMjc1LDEuMjc1LDIuOTQ2LDEuOTEzLDQuNjE3LDEuOTEzICAgczMuMzQzLTAuNjM4LDQuNjE3LTEuOTEzbDYyLjM3NC02Mi4zNzNjMi42MDItMi42MDMsNi4wMzEtMy45MDMsOS40NjItMy45MDNjMy45MTUsMC4wMDEsNy44MzEsMS42OTYsMTAuNTE1LDUuMDg3ICAgYzQuMjU2LDUuMzc2LDMuNTA5LDEzLjE3OS0xLjM0LDE4LjAyN2wtNjIuMDgxLDYyLjA4MWMtMi41NTMsMi41NTQtMi41NTMsNi42OTIsMCw5LjI0NmMxLjI1OCwxLjI1OCwyLjkwNiwxLjg4Nyw0LjU1NiwxLjg4NyAgIGMxLjY0OCwwLDMuMjk3LTAuNjI5LDQuNTU1LTEuODg3bDQ4LjgxMS00OC44MWMyLjYwMy0yLjYwMyw2LjAzMi0zLjkwMyw5LjQ2Mi0zLjkwM2MzLjkxNSwwLDcuODMxLDEuNjk1LDEwLjUxNSw1LjA4NyAgIGM0LjI1Niw1LjM3NiwzLjUwOSwxMy4xNzktMS4zNCwxOC4wMjdsLTQ4LjM0OSw0OC4zNWMtMi42MTIsMi42MTEtMi42MTIsNi44NDcsMCw5LjQ1OGwwLjA3OCwwLjA3OSAgIGMxLjIwNywxLjIwNywyLjc4OSwxLjgxLDQuMzcsMS44MWMxLjU4MiwwLDMuMTY0LTAuNjAzLDQuMzctMS44MWwyOS45NzQtMjkuOTc0YzIuNzAxLTIuNzAxLDYuMzE3LTQuMTI5LDkuOTIxLTQuMTI5ICAgYzIuODY3LDAsNS43MjYsMC45MDQsOC4xMDcsMi43ODlDMjUzLjExNCwxNjEuNTk4LDI1My41MDgsMTcwLjk2NywyNDcuOTM1LDE3Ni41Mzl6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiMzM0VCNDAiIGRhdGEtb2xkX2NvbG9yPSIjMzNlYjQwIj48L3BhdGg+CjwvZz48c2NyaXB0IHhtbG5zPSIiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzMzRUI0MCIgZGF0YS1vbGRfY29sb3I9IiMzM2ViNDAiPjwvc2NyaXB0PjwvZz4gPC9zdmc+"/>
                                                <span>{{ $candidate->likes_count }}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <p class="card-text">{{ \Illuminate\Support\Str::words($candidate->info, 40,'...') }}</p>
                                    <!--<p class="card-text">-->
                                    <!--<small class="text-muted">Last updated 3 mins ago</small>-->
                                    <!--</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/candidate.js') }}"></script>
@endsection