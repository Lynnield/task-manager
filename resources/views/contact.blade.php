@extends('layout') 
@section('title', 'Contact Me') 
@section('content') 
 <h1>Contact Me</h1> 
 <div style="margin-top: 2rem;"> 
 <p style="font-size: 1.1rem; margin-bottom: 2rem;"> 
 Feel free to reach out to me through any of the following:  </p> 
  
 <div style="background: var(--card-bg); padding: 2rem; border-radius: 5px; border: 1px solid var(--border-color);">  <p style="margin-bottom: 1rem;"> 
 <strong> Email:</strong>  
 <a href="mailto:{{ $email }}" style="color: var(--accent-cyan);">{{ $email  }}</a> 
 </p> 
 <p> 
 <strong> Phone:</strong> {{ $phone }} 
 </p> 
 </div> 
 </div> 
@endsection