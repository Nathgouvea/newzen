Perfect — let’s do this right from the ground up.
Here’s your clean, clear, and complete requirements document (in natural language, ideal for Cursor) for building the static HTML/CSS/JS version of the Zen Secrets website first — no PHP, no WordPress yet.

You can copy and paste this directly into your requirements.md file, or give it to Cursor as a prompt.

⸻

🌿 Zen Secrets – Static Website Requirements (for Cursor)

🧘 Objetivo

Criar o site completo da Zen Secrets utilizando HTML, CSS e JavaScript puro — sem PHP, sem WordPress.
O foco é construir todas as páginas, estrutura visual, responsividade e interações leves.
Depois, esse projeto será transformado em tema WordPress.

⸻

📁 Estrutura de Arquivos

Organize o projeto da seguinte forma:

zen-secrets/
├── index.html ← Página inicial
├── comprar.html ← Página da loja com categorias
├── aromas.html ← Página sobre os aromas
├── contato.html ← Página de contato
├── assets/
│ ├── css/
│ │ └── style.css
│ ├── js/
│ │ └── main.js
│ ├── fonts/ ← Fonte Arimo
│ └── imagens/ ← Imagens dos produtos, logo etc.

⸻

🎨 Identidade Visual
• Estilo: Minimalista, sensorial, elegante
• Fonte: Arimo (Google Fonts)
• Cores:
• Fundo: Branco #ffffff
• Texto: Preto #000000
• Elementos decorativos: Cinza #afafaf
• Layout: Máximo de 1200px, centralizado, espaçamento amplo
• Responsivo: Sim, mobile-first

⸻

📄 Páginas do Site

⸻

1. Home – index.html
   • Logo da Zen Secrets no topo
   • Menu principal com as seções:
   • Início
   • Comprar (com dropdown)
   • Sobre os Aromas (com dropdown)
   • Fale Conosco
   • Hero section:
   • Título: “Harmonia e Bem-Estar Através do Aroma”
   • Texto descritivo
   • Botão CTA: “Conheça nossos Produtos”
   • Imagem de destaque (vela ou ambiente sensorial)
   • Rodapé com redes sociais e direitos autorais

⸻

2. Comprar – comprar.html
   • Menu com dropdown funcional (hover):
   • Aromatizadores
   • Home Spray
   • Velas Aromáticas
   • Kits Especiais
   • Lembrancinhas
   • Acessórios
   • Estrutura visual em grid com cards de produto:
   • Nome
   • Imagem
   • Descrição curta
   • Botão (ex: “Ver Produto” ou “Comprar”)
   • Filtro ou barra de busca (estático)

⸻

3. Sobre os Aromas – aromas.html
   • Lista de aromas com blocos:
   • Nome
   • Família Olfativa
   • Intensidade e Projeção
   • Notas
   • Descrição
   • Aromas:
   • Flor de Figo
   • Chá Branco
   • Marinho
   • Vela Bamboo
   • Vela Palo Santo

⸻

4. Fale Conosco – contato.html
   • Texto de introdução
   • Links diretos:
   • WhatsApp: (16) 99162-6921
   • Instagram: @secretszen
   • Formulário de sugestão (simples — nome, mensagem, botão)

⸻

🔎 Funcionalidades Básicas com JS
• Menu dropdown com JS simples para mobile (toggle no menu)
• Animação leve de fade-in nos blocos do hero e produtos
• Scroll suave nos links internos
• Nenhum framework JS, apenas vanilla JS

⸻

📦 Extras
• Imagens reais serão colocadas na pasta /assets/imagens/
• Usar alt em todas as imagens
• Todas as páginas devem estar conectadas entre si via links no menu
• O layout deve funcionar bem em mobile e tablet

⸻

Quer que eu agora gere para você os arquivos index.html e style.css iniciais com o header + hero + estrutura de navegação prontos?
