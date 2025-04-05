<style>
    :root {
        --light-cyan: #DBFFF3;
        --diamond: #B8EFF5;
        --lavender-blue: #C3BFFF;
        --max-blue-purple: #AC99F2;
        --violet-blue: #7E7CD9;
        --white: #FFFFFF;
        --light-gray: #F5F5F7;
        --medium-gray: #E0E0E0;
        --dark-gray: #333333;
        --error-red: #dc3545;
        --success-green: #28a745;
    }

    .form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: var(--white);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--medium-gray);
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-section {
        margin-bottom: 2rem;
        padding: 2rem;
        background-color: var(--light-gray);
        border-radius: 15px;
        border: 1px solid var(--medium-gray);
        transition: all 0.3s ease;
    }

    .form-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border-color: rgba(126, 124, 217, 0.3);
    }

    .section-title {
        font-family: 'Cinzel', serif;
        color: var(--violet-blue);
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100px;
        height: 2px;
        background-color: var(--violet-blue);
        box-shadow: 0 0 10px rgba(126, 124, 217, 0.3);
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--dark-gray);
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .form-label.required::after {
        content: " *";
        color: var(--error-red);
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--medium-gray);
        border-radius: 10px;
        background-color: var(--white);
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--violet-blue);
        box-shadow: 0 0 0 3px rgba(126, 124, 217, 0.2);
    }

    .form-control.error {
        border-color: var(--error-red);
    }

    .form-control.success {
        border-color: var(--success-green);
    }

    .form-select {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--medium-gray);
        border-radius: 10px;
        background-color: var(--white);
        transition: all 0.3s ease;
        font-size: 1rem;
        cursor: pointer;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--violet-blue);
        box-shadow: 0 0 0 3px rgba(126, 124, 217, 0.2);
    }

    .form-textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--medium-gray);
        border-radius: 10px;
        background-color: var(--white);
        min-height: 150px;
        resize: vertical;
        transition: all 0.3s ease;
        font-size: 1rem;
        line-height: 1.5;
    }

    .form-textarea:focus {
        outline: none;
        border-color: var(--violet-blue);
        box-shadow: 0 0 0 3px rgba(126, 124, 217, 0.2);
    }

    .btn {
        display: inline-block;
        padding: 0.8rem 2rem;
        background-color: rgba(126, 124, 217, 0.1);
        color: var(--violet-blue);
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid rgba(126, 124, 217, 0.3);
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn:hover {
        background-color: rgba(126, 124, 217, 0.2);
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(126, 124, 217, 0.2);
    }

    .btn:active {
        transform: translateY(0);
    }

    .alert {
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 10px;
        background-color: rgba(126, 124, 217, 0.1);
        color: var(--violet-blue);
        border: 1px solid rgba(126, 124, 217, 0.3);
        animation: slideIn 0.3s ease-out;
    }

    .alert.error {
        background-color: rgba(220, 53, 69, 0.1);
        color: var(--error-red);
        border-color: rgba(220, 53, 69, 0.3);
    }

    .alert.success {
        background-color: rgba(40, 167, 69, 0.1);
        color: var(--success-green);
        border-color: rgba(40, 167, 69, 0.3);
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .image-preview {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 1rem;
        border: 1px solid var(--medium-gray);
        transition: all 0.3s ease;
    }

    .image-preview:hover {
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .form-footer {
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid var(--medium-gray);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-helper {
        font-size: 0.9rem;
        color: var(--dark-gray);
        opacity: 0.7;
        margin-top: 0.5rem;
    }

    .form-error {
        color: var(--error-red);
        font-size: 0.9rem;
        margin-top: 0.5rem;
        animation: fadeIn 0.3s ease-out;
    }

    @media (max-width: 768px) {
        .form-container {
            margin: 1rem;
            padding: 1rem;
        }

        .form-section {
            padding: 1rem;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style> 