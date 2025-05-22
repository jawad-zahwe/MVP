```mermaid
erDiagram
    %% المستخدمون والكيانات الرئيسية
    users ||--o{ trainers : "has"
    users ||--o{ assistants : "has"
    users ||--o{ trainees : "has"
    users ||--o{ organizations : "has"
    users {
        int id PK
        string name
        string email
        string password
        string phone
        int user_type_id FK
    }

    user_types ||--o{ users : "defines"
    user_types {
        int id PK
        string name
        string description
    }

    trainers {
        int id PK
        int user_id FK
        string specialization
        int years_experience
        text bio
    }

    assistants {
        int id PK
        int user_id FK
        string specialization
        int years_experience
    }

    trainees {
        int id PK
        int user_id FK
        string current_position
        string organization
    }

    organizations {
        int id PK
        int user_id FK
        string name
        string type
        int employee_count
    }

    %% الإعلانات
    advertisements ||--o{ training_advertisements : "has"
    advertisements ||--o{ tender_advertisements : "has"
    advertisements ||--o{ trainer_need_advertisements : "has"
    advertisements ||--o{ trainer_assistant_advertisements : "has"
    advertisements {
        int id PK
        string title
        text description
        date start_date
        date end_date
        string status
    }

    %% المؤهلات والمتطلبات
    trainers ||--o{ trainer_required_qualifications : "has"
    trainers ||--o{ trainer_required_documents : "has"
    trainers ||--o{ trainer_required_trainings : "has"
    trainers ||--o{ trainer_required_deliverables : "has"

    required_qualifications {
        int id PK
        string name
        text description
    }

    required_documents {
        int id PK
        string name
        text description
    }

    required_trainings {
        int id PK
        string name
        text description
    }

    required_deliverables {
        int id PK
        string name
        text description
    }

    %% الخدمات والبرامج
    services ||--o{ service_objectives : "has"
    services ||--o{ program_axes : "has"
    services ||--o{ program_features : "has"

    services {
        int id PK
        string name
        text description
        decimal price
    }

    service_objectives {
        int id PK
        int service_id FK
        string objective
        string focus_point
    }

    program_axes {
        int id PK
        int service_id FK
        string name
        text description
    }

    program_features {
        int id PK
        int service_id FK
        string name
        text description
    }

    %% العلاقات الإضافية
    trainers ||--o{ training_experiences : "has"
    training_experiences {
        int id PK
        int trainer_id FK
        string title
        string organization
        date start_date
        date end_date
    }

    organizations ||--o{ services : "provides"
    trainers ||--o{ services : "offers"
} 