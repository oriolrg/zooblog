Hola <i>{{ $demo->nom }}</i>,
<p>El seu missatge ha estat correctament enviat a Zoo del Pirineu.</p>

<p><u>Contingut del missatge:</u></p>

<div>
<p><b>Demo One:</b>&nbsp;{{ $demo->nom }}</p>
<p><b>Telèfon:</b>&nbsp;{{ $demo->telefon }}</p>
<p><b>Email:</b>&nbsp;{{ $demo->email }}</p>
</div>

<p><u>Cos del Missatge:</u></p>

<div>
<i>{{ $demo->message }}</i>
</div>
<br/>
Moltes gràcies per contactar amb nosaltres, en breu rebrà resposta.
<br/>
<i>Zoo del pirineu</i>
<a href="zoopirineu.com">zoopirineu.com</a>
