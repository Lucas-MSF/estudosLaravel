<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;
    private $nome;
    private $quantidade_temporadas;
    private $quantidade_episodios;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nome,int $quantidade_temporadas, int $quantidade_episodios )
    {
        $this->nome=$nome;
        $this->quantidade_temporadas= $quantidade_temporadas;
        $this->quantidade_episodios= $quantidade_episodios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nome = $this->nome;
        $quantidade_temporadas= $this->quantidade_temporadas;
        $quantidade_episodios= $this->quantidade_episodios;
        return $this->markdown('mail.serie.nova-serie', compact('nome','quantidade_temporadas','quantidade_episodios'));
    }

}
