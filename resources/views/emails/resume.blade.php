<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Candidatura - Paytour</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #f8f9ff 0%, #e6eeff 100%);
            padding: 20px;
            line-height: 1.6;
            color: #212529;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Header igual ao formulário */
        .email-header {
            background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%);
            padding: 32px 24px;
            text-align: center;
            color: white;
        }
        
        .email-header h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .email-header p {
            font-size: 16px;
            opacity: 0.75;
            margin: 0;
            font-weight: 400;
        }
        
        /* Corpo do email */
        .email-body {
            padding: 32px 24px;
        }
        
        /* Badge de sucesso moderno */
        .success-alert {
            background: #d1e7dd;
            border: 0;
            border-radius: 12px;
            border-left: 4px solid #198754;
            padding: 16px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .success-content {
            display: flex;
            align-items: center;
        }
        
        .success-icon {
            color: #198754;
            font-size: 20px;
            margin-right: 12px;
        }
        
        .success-text {
            color: #155724;
            font-weight: 600;
            margin: 0;
        }
        
        /* Card do candidato igual aos cards do site */
        .candidate-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin: 24px 0;
        }
        
        .candidate-header {
            background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%);
            padding: 24px;
            text-align: center;
            color: white;
            border-radius: 20px 20px 0 0;
        }
        
        .candidate-header h2 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .candidate-body {
            padding: 24px;
        }
        
        /* Informações igual aos inputs do formulário */
        .info-group {
            margin-bottom: 18px;
        }
        
        .info-label {
            display: block;
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
            font-size: 15px;
        }
        
        .info-icon {
            color: #6f42c1;
            margin-right: 8px;
        }
        
        .info-value {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 16px;
            color: #495057;
            font-weight: 500;
            border-left: 4px solid #6f42c1;
        }
        
        /* Observações como textarea */
        .observations-value {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 16px;
            color: #495057;
            font-weight: 400;
            min-height: 100px;
            border-left: 4px solid #6f42c1;
            line-height: 1.5;
            font-style: italic;
        }
        
        /* Metadata igual ao estilo dos cards */
        .metadata-card {
            background: #f8f9fa;
            border: 0;
            border-radius: 16px;
            padding: 20px;
            margin-top: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #6f42c1;
        }
        
        .metadata-title {
            color: #6f42c1;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        
        .metadata-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .metadata-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .metadata-label {
            color: #6c757d;
            font-weight: 600;
            font-size: 14px;
        }
        
        .metadata-value {
            color: #495057;
            font-weight: 500;
            font-size: 14px;
        }
        
        /* Footer igual ao estilo do site */
        .email-footer {
            background: #f8f9fa;
            padding: 24px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        
        .footer-text {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 12px;
            font-weight: 500;
        }
        
        .paytour-brand {
            color: #6f42c1;
            font-weight: 700;
            font-size: 18px;
            text-decoration: none;
        }
        
        .footer-small {
            color: #adb5bd;
            font-size: 14px;
            margin: 0;
        }
        
        /* Responsivo */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            
            .email-container {
                border-radius: 16px;
            }
            
            .email-header,
            .email-body,
            .email-footer {
                padding: 20px;
            }
            
            .candidate-header,
            .candidate-body {
                padding: 20px;
            }
            
            .metadata-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
            
            .metadata-value {
                margin-top: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header igual ao formulário -->
        <div class="email-header">
            <h1>📨 Candidatura Recebida!</h1>
        </div>
        
        <!-- Corpo do email -->
        <div class="email-body">
            <!-- Alert de sucesso igual ao AlertMessage.vue -->
            <div class="success-alert">
                <div class="success-content">
                    <div class="success-icon">✅</div>
                    <div class="success-text">Candidatura processada com sucesso</div>
                </div>
            </div>
            
            <!-- Card do candidato igual ao formulário -->
            <div class="candidate-card">
                <div class="candidate-header">
                    <h2>👤 Dados do Candidato</h2>
                </div>
                
                <div class="candidate-body">
                    <!-- Nome -->
                    <div class="info-group">
                        <label class="info-label">
                            <span class="info-icon">👤</span>
                            Nome Completo
                        </label>
                        <div class="info-value">{{ $name }}</div>
                    </div>
                    
                    <!-- Email -->
                    <div class="info-group">
                        <label class="info-label">
                            <span class="info-icon">📧</span>
                            E-mail
                        </label>
                        <div class="info-value">{{ $email }}</div>
                    </div>
                    
                    <!-- Telefone -->
                    <div class="info-group">
                        <label class="info-label">
                            <span class="info-icon">📱</span>
                            Telefone
                        </label>
                        <div class="info-value">{{ $phone }}</div>
                    </div>
                    
                    <!-- Cargo Desejado -->
                    <div class="info-group">
                        <label class="info-label">
                            <span class="info-icon">💼</span>
                            Cargo Desejado
                        </label>
                        <div class="info-value">{{ $desired_job }}</div>
                    </div>
                    
                    <!-- Escolaridade -->
                    <div class="info-group">
                        <label class="info-label">
                            <span class="info-icon">🎓</span>
                            Escolaridade
                        </label>
                        <div class="info-value">{{ $education }}</div>
                    </div>
                    
                    <!-- Observações -->
                    @if($observations)
                    <div class="info-group">
                        <label class="info-label">
                            <span class="info-icon">💭</span>
                            Observações
                        </label>
                        <div class="observations-value">{{ $observations }}</div>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Metadata igual aos cards do dashboard -->
            <div class="metadata-card">
                <div class="metadata-title">📊 Informações Técnicas</div>
                <div class="metadata-item">
                    <span class="metadata-label">IP de Origem:</span>
                    <span class="metadata-value">{{ $ip_address }}</span>
                </div>
                <div class="metadata-item">
                    <span class="metadata-label">Data/Hora:</span>
                    <span class="metadata-value">{{ date('d/m/Y H:i:s', strtotime($created_at)) }}</span>
                </div>
            </div>
        </div>
        
        <!-- Footer igual ao estilo do site -->
        <div class="email-footer">
            <p class="footer-text">
                Esta candidatura foi enviada através do site da 
                <a href="#" class="paytour-brand">Paytour</a>
            </p>
            <p class="footer-small">
                Sistema de Gestão de Candidaturas v1.0
            </p>
        </div>
    </div>
</body>
</html>