<?php
{
  "kind": "calendar#event",
  "etag": etag,
  "id": string,
  "status": string,
  "htmlLink": string,
  "created": datetime,
  "updated": datetime,
  "summary": string,
  "description": string,
  "location": string,
  "colorId": string,
  "creator": {    "id": string,    "email": string,    "displayName": string,    "self": boolean  },
  "organizer": {    "id": string,    "email": string,    "displayName": string,    "self": boolean  },
  "start": {    "date": date,    "dateTime": datetime,    "timeZone": string  },
  "end": {    "date": date,    "dateTime": datetime,    "timeZone": string  },
  "endTimeUnspecified": boolean,
  "recurrence": [    string  ],
  "recurringEventId": string,
  "originalStartTime": {    "date": date,    "dateTime": datetime,    "timeZone": string  },
  "transparency": string,
  "visibility": string,
  "iCalUID": string,
  "sequence": integer,
  "attendees": [    {      "id": string,      "email": string,      "displayName": string,      "organizer": boolean,      "self": boolean,      "resource": boolean,      "optional": boolean,      "responseStatus": string,      "comment": string,      "additionalGuests": integer    }  ],
  "attendeesOmitted": boolean,
  "extendedProperties": {    "private": {      (key): string    },    "shared": {      (key): string    }  },
  "hangoutLink": string,  "conferenceData": {            "createRequest": {               "requestId": string,                "conferenceSolutionKey": {        "type": string      },                "status": {        "statusCode": string      }        },          "entryPoints": [{        "entryPointType": string,        "uri": string,        "label": string,        "pin": string,        "accessCode": string,        "meetingCode": string,        "passcode": string,        "password": string      }        ],        "conferenceSolution": {          "key": {        "type": string      },      "name": string,      "iconUri": string    },        "conferenceId": string,        "signature": string,        "notes": string,  },
  "gadget": {    "type": string,    "title": string,    "link": string,    "iconLink": string,    "width": integer,    "height": integer,    "display": string,    "preferences": {      (key): string    }  },
  "anyoneCanAddSelf": boolean,
  "guestsCanInviteOthers": boolean,
  "guestsCanModify": boolean,
  "guestsCanSeeOtherGuests": boolean,
  "privateCopy": boolean,
  "locked": boolean,
  "reminders": {    "useDefault": boolean,    "overrides": [      {        "method": string,        "minutes": integer      }    ]  },  "source": {    "url": string,    "title": string  },
  "workingLocationProperties": {    "type": string,    "homeOffice": (value),    "customLocation": {      "label": string    },    "officeLocation": {      "buildingId": string,      "floorId": string,      "floorSectionId": string,      "deskId": string,      "label": string    }  },
  "outOfOfficeProperties": {    "autoDeclineMode": string,    "declineMessage": string  },
  "focusTimeProperties": {    "autoDeclineMode": string,    "declineMessage": string,    "chatStatus": string  },
  "attachments": [    {      "fileUrl": string,      "title": string,      "mimeType": string,      "iconLink": string,      "fileId": string    }  ],
  "eventType": string
}

{
  "kind": "calendar#event",  // Identifica que o objeto é um evento do Google Calendar.
  
  "etag": etag,  // Marca uma versão específica do evento. Útil para controle de cache.
  
  "id": string,  // ID único do evento.
  
  "status": string,  // Indica o status do evento, como "confirmed", "tentative", ou "cancelled".
  
  "htmlLink": string,  // Link para visualizar o evento no Google Calendar.
  
  "created": datetime,  // Data e hora em que o evento foi criado.
  
  "updated": datetime,  // Última vez que o evento foi atualizado.
  
  "summary": string,  // Título ou resumo do evento.
  
  "description": string,  // Descrição detalhada do evento.
  
  "location": string,  // Local onde o evento vai acontecer.
  
  "colorId": string,  // ID da cor usada para o evento, se personalizado.

  "creator": {    
    "id": string,  // ID do criador do evento.
    "email": string,  // E-mail do criador.
    "displayName": string,  // Nome exibido do criador.
    "self": boolean  // Indica se o criador é o usuário atual.
  },
  
  "organizer": {    
    "id": string,  // ID do organizador do evento.
    "email": string,  // E-mail do organizador.
    "displayName": string,  // Nome exibido do organizador.
    "self": boolean  // Indica se o organizador é o usuário atual.
  },
  
  "start": {    
    "date": date,  // Data de início, se o evento for de dia inteiro.
    "dateTime": datetime,  // Data e hora de início, se o evento tiver uma hora específica.
    "timeZone": string  // Fuso horário do início do evento.
  },
  
  "end": {    
    "date": date,  // Data de término, se o evento for de dia inteiro.
    "dateTime": datetime,  // Data e hora de término, se o evento tiver uma hora específica.
    "timeZone": string  // Fuso horário do término do evento.
  },
  
  "endTimeUnspecified": boolean,  // Se o horário de término é indefinido.
  
  "recurrence": [ string ],  // Regras de recorrência, como "daily", "weekly".
  
  "recurringEventId": string,  // Se o evento faz parte de uma série recorrente, aqui está o ID da série.
  
  "originalStartTime": {    
    "date": date,  // Data original de início do evento recorrente.
    "dateTime": datetime,  // Data e hora original de início do evento recorrente.
    "timeZone": string  // Fuso horário do horário original.
  },
  
  "transparency": string,  // Indica se o evento bloqueia a disponibilidade do usuário ("opaque" ou "transparent").
  
  "visibility": string,  // Define a visibilidade do evento, como "public", "private".
  
  "iCalUID": string,  // ID do evento no formato de iCalendar.
  
  "sequence": integer,  // Número de vezes que o evento foi atualizado.
  
  "attendees": [  // Lista de participantes do evento.
    {
      "id": string,  // ID do participante.
      "email": string,  // E-mail do participante.
      "displayName": string,  // Nome exibido do participante.
      "organizer": boolean,  // Indica se o participante é o organizador.
      "self": boolean,  // Indica se o participante é o usuário atual.
      "resource": boolean,  // Se o participante é um recurso (como uma sala de reuniões).
      "optional": boolean,  // Se a participação do convidado é opcional.
      "responseStatus": string,  // Status da resposta do participante, como "accepted", "declined".
      "comment": string,  // Comentários deixados pelo participante.
      "additionalGuests": integer  // Número de convidados adicionais trazidos pelo participante.
    }
  ],
  
  "attendeesOmitted": boolean,  // Indica se a lista de participantes foi omitida por privacidade.
  
  "extendedProperties": {  // Propriedades extras que podem ser usadas pelo usuário ou sistema.
    "private": { (key): string },  // Propriedades privadas.
    "shared": { (key): string }  // Propriedades compartilhadas.
  },
  
  "hangoutLink": string,  // Link para uma reunião no Google Hangouts (ou Google Meet).
  
  "conferenceData": {  // Dados relacionados à conferência (ex: videochamada).
    "createRequest": {  
      "requestId": string,  
      "conferenceSolutionKey": { "type": string },  
      "status": { "statusCode": string }  
    },  
    "entryPoints": [  
      {  
        "entryPointType": string,  // Tipo de ponto de entrada, como "video", "phone".
        "uri": string,  // URI para entrar na conferência.
        "label": string,  
        "pin": string,  
        "accessCode": string,  
        "meetingCode": string,  
        "passcode": string,  
        "password": string  
      }  
    ],  
    "conferenceSolution": {  
      "key": { "type": string },  
      "name": string,  
      "iconUri": string  
    },  
    "conferenceId": string,  
    "signature": string,  
    "notes": string  
  },
  
  "gadget": {  // Gadget anexado ao evento.
    "type": string,  
    "title": string,  
    "link": string,  
    "iconLink": string,  
    "width": integer,  
    "height": integer,  
    "display": string,  
    "preferences": { (key): string }
  },
  
  "anyoneCanAddSelf": boolean,  // Indica se qualquer pessoa pode se adicionar ao evento.
  
  "guestsCanInviteOthers": boolean,  // Indica se os convidados podem convidar outros.
  
  "guestsCanModify": boolean,  // Indica se os convidados podem modificar o evento.
  
  "guestsCanSeeOtherGuests": boolean,  // Indica se os convidados podem ver os outros convidados.
  
  "privateCopy": boolean,  // Se o evento é uma cópia privada (não sincronizada com a série).
  
  "locked": boolean,  // Se o evento está bloqueado e não pode ser editado.
  
  "reminders": {  // Configurações de lembrete para o evento.
    "useDefault": boolean,  // Se usa os lembretes padrão do calendário.
    "overrides": [  
      {  
        "method": string,  // Método do lembrete, como "popup", "email".
        "minutes": integer  // Quantos minutos antes do evento o lembrete é enviado.
      }  
    ]  
  },
  
  "source": {  // Fonte original do evento (se veio de um site, por exemplo).
    "url": string,  // URL da fonte do evento.
    "title": string  // Título da fonte.
  },
  
  "workingLocationProperties": {  // Propriedades relacionadas ao local de trabalho (home office, por exemplo).
    "type": string,  
    "homeOffice": (value),  
    "customLocation": { "label": string },  
    "officeLocation": {  
      "buildingId": string,  
      "floorId": string,  
      "floorSectionId": string,  
      "deskId": string,  
      "label": string  
    }  
  },
  
  "outOfOfficeProperties": {  // Propriedades para eventos de "fora do escritório".
    "autoDeclineMode": string,  
    "declineMessage": string  
  },
  
  "focusTimeProperties": {  // Propriedades para eventos de tempo de foco.
    "autoDeclineMode": string,  
    "declineMessage": string,  
    "chatStatus": string  
  },
  
  "attachments": [  // Arquivos anexados ao evento.
    {  
      "fileUrl": string,  
      "title": string,  
      "mimeType": string,  
      "iconLink": string,  
      "fileId": string  
    }  
  ],
  
  "eventType": string  // Tipo do evento, como "default", "outOfOffice", "focusTime".
}

?>