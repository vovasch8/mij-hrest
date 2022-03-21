<style>.ra-button {padding: .3em .9em; border-radius: .25em; background: linear-gradient(#fff, #efefef); box-shadow: 0 1px .2em gray; display: inline-flex; align-items: center; cursor: pointer;} .ra-button img {height: 1em; margin: 0 .5em 0 0;} #ra-player{margin-bottom: 5px;}</style>

<div id="ra-player" data-skin="https://assets.sitespeaker.link/embed/skins/default">
    <div class="ra-button" onclick="readAloud(document.getElementById('ra-audio'), document.getElementById('ra-player'))">
        <img src="https://assets.sitespeaker.link/embed/skins/default/play-icon.png"/>
        Слухати статтю
    </div>
</div>
<audio id="ra-audio" data-lang="uk-UA" data-voice="Google uk-UA-Standard-A" data-key="01fceb2d58da2b3e2fcd1972c699ae59"></audio>
<script>function readAloud(e,n){var s="https://assets.sitespeaker.link/embed/";/iPad|iPhone|iPod/.test(navigator.userAgent)&&(e.src=s+"sound/silence.mp3",e.play(),"undefined"!=typeof speechSynthesis&&speechSynthesis.speak(new SpeechSynthesisUtterance(" ")));var t=document.createElement("script");t.onload=function(){readAloudInit(e,n)},t.src=s+"js/readaloud.min.js",document.head.appendChild(t)}</script>
