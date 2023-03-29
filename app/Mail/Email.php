<?php

namespace App\Mail;

use App\Interface\ConversaoInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct( 

        public string $moedaDestino,
        public string $meioPagamento,
        public float $valorInput,
        public string $usuario,
        public float $valorTaxaPagamento,
        public float $valorTaxaConversao,
        public float $valorBaseLiquido,
        public float $valorMoeda,
        public float $valorConvertido
    )
    {
        $this->subject="Conversão BRL-$moedaDestino.";
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Conversão BRL ',
        );
    }


    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->markdown('mail.Email');
    }
}
