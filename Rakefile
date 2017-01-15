require 'rmagick'
require 'map-rec'
require 'rake/clean'
require 'kramdown'
require 'xml-dsl'



def markdown_to_html markdown
  Kramdown::Document.new(markdown).to_html
end


def block_is_html &block
  array = map_rec(block_is_array(&block)) do |x|
    x.is_a?(Symbol) ? x.to_s.gsub(/_*$/, '').to_sym : x
  end

  XML::from_array array, format: false
end


def file_page markdown
  markdown_to_html markdown
end


def markdown_escape text
  text.gsub(/\*|_|`/, '\\\\\0')
end


def get_title path
  path = dir_to_index(path) if File.directory?(path)
  markdown_to_html(File.open(path).to_a[0].sub(/^#+ */, '').strip)
      .gsub(/(<p>|<\/p>)/, '').strip
end


def md_file_to_link path
  link = is_index_md(path) ? File.dirname(path) : path.ext('html')
  "<a href=\"#{link}\">#{get_title(path)}</a>"
end


def md_files_to_links paths
  paths.map do |path|
    md_file_to_link path
  end.sort_by(&:downcase)
end


def dir_to_index path
  File.join path, 'index.md'
end


def is_index_md path
  path =~ /(^|\/)index\.md$/
end


def is_top_index_md path
  path == 'index.md'
end


HISTORY_DIR = '_history'

def in_history_dir path
  path =~ /(^|\/)#{HISTORY_DIR}/
end


def dir_page markdown, filename
  Dir.chdir File.dirname(filename) do
    md_files = Dir.entries('.').select do |path|
      path !~ /^\.+$/ and not is_index_md(path) and not in_history_dir(path)
    end.map do |path|
      File.directory?(path) ? dir_to_index(path) : path
    end.select do |path|
      File.exist?(path) and path =~ /\.md$/
    end

    markdown_to_html(markdown + "\n" +
                     md_files_to_links(md_files)
                     .map{ |link| '- ' + link }.join("\n"))
  end
end


FAVICON = 'favicon.png'
TOUCH_ICON = 'apple-touch-icon.png'
GIT_LOG = "git log --date='format:%A, %B %d, %Y'"
TOP_TITLE = get_title('index.md')
LOGO_TOP_TITLE = '<img src="/icon.svg" alt="logo" class="logo"/> ' + TOP_TITLE

rule '.html' => '.md' do |t|
  unless in_history_dir(t.source)
    history_command = "#{GIT_LOG} -p #{t.source}"
    dates = `#{history_command} | grep Date:`.split("\n")
    history_dir = File.join File.dirname(t.source), HISTORY_DIR
    md_history_file = File.join history_dir, File.basename(t.source)
  end

  str = block_is_html do
    html do
      head do
        title(is_top_index_md(t.source) ? \
              TOP_TITLE : get_title(t.source) + " | " + TOP_TITLE)
        link rel: 'stylesheet', type: 'text/css', href: '/style.css'
        link href: "/#{FAVICON}", type: 'image/png', rel: 'icon'
        link href: "/#{TOUCH_ICON}", type: 'image/png', rel: 'apple-touch-icon'
        meta name: 'viewport', content: 'width=device-width'
        base_dir = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0'
        link rel: 'stylesheet', href: "#{base_dir}/styles/default.min.css"
        script src: "#{base_dir}/highlight.min.js"
        script 'hljs.initHighlightingOnLoad();'
        script src: 'https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML'

        style %(
          body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
          }

          .date {
            margin-right: 0.5em;
          }

          img.logo {
            height: 1em;
            margin-right: 0.2em;
            vertical-align: -0.15em;
          }

          a.top-link {
            color: #333;
            font-size: 1.2em;
            font-weight: 500;
            margin-left: 0.2em;
          }

          a.back {
            margin-right: 1em;
          }

          div.buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
          }

          @media only screen and (max-width: 480px) {
            body { padding: 1.5ex }
            .date { display: block }
          }
        )
      end

      body class: 'markdown-body' do
        unless is_top_index_md(t.source)
          div class: 'buttons' do
            a LOGO_TOP_TITLE, href: '/', class: 'top-link'
            a('back', href: (in_history_dir(t.name) \
                            ?  File.join('..', File.basename(t.name))
                            : (is_index_md(t.source) ? '..' : '.')),
                      class: 'back')
          end

          hr
        end

        markdown = File.read t.source
        markdown = markdown.gsub(/^# .*$/, "# #{LOGO_TOP_TITLE}") \
            if is_top_index_md(t.source)
        div((is_index_md(t.source) and not in_history_dir(t.source)) ?
            dir_page(markdown, t.source) : file_page(markdown))

        if is_top_index_md(t.source)
          div do
            h2 'Change log'

            ul do
              `#{GIT_LOG} --name-only -p '*.md'`.split('commit').select do |s|
                not s.include? 'Merge'
              end.each do |chunk|
                lines = chunk.split("\n").select{ |s| s.strip != '' }[2..-1]
                next unless lines
                date, comment = lines.map { |s| s.strip }
                files = lines[2..-1]
                next unless files
                files = files.select { |file| File.exist? file }
                next if files.empty?

                li "#{date.gsub(/Date: */, '')}: #{comment} "\
                   "(#{md_files_to_links(files).join(', ')})"
              end
            end
          end
        end

        hr

        unless in_history_dir(t.source)
          div do
            p_ do
              span(dates[0].sub('Date', 'Last modified') + ', ', class: 'date')
              span(dates[-1].sub('Date', 'Created') + ', ', class: 'date')

              span do
                a('Page history',
                  href: File.join(HISTORY_DIR, File.basename(t.name)))
              end
            end
          end
        end

        div markdown_to_html("
          To the extent possible under law, the person who associated
          [The Unlicense](https://unlicense.org/UNLICENSE) with this work
          has waived all copyright and related or neighboring rights to this
          work.
        ".split.join ' ')
      end
    end
  end

  unless in_history_dir(t.source)
    history = `#{history_command}`.split("\n") \
                                  .map{ |s| '    ' + s } \
                                  .join("\n")

    mkdir_p history_dir unless Dir.exist? history_dir
    File.write(md_history_file,
               "# History of #{markdown_escape t.source}\n\n#{history}")
    Rake::Task[md_history_file.ext 'html'].invoke
  end

  File.write t.name, str
end


file 'style.css' do |t|
  sh "curl https://raw.githubusercontent.com/sindresorhus/github-markdown-css/gh-pages/github-markdown.css > #{t.name}"
end


def svg_icon filename
  img, _ = Magick::Image.from_blob(File.read(filename)) do
    self.format = 'SVG'
  end

  img
end


def points *points
  points.map do |x, y|
    "#{x},#{y}"
  end.join ' '
end


ICON_SVG = 'icon.svg'

file ICON_SVG do |t|
  full = 4242

  source = xml do
    svg xmlns: 'http://www.w3.org/2000/svg', width: full, height: full do
      rect x: 0, y: 0, width: full, height: full, fill: :white
      polygon points: points([0, 0], [full, 0], [full, full]), fill: :red
      polygon points: points([0, 0], [0, full], [full, 0]), fill: :black
    end
  end

  File.write t.name, source
end


file FAVICON => ICON_SVG do |t|
  svg_icon(t.source).resize(32, 32).write t.name
end


file TOUCH_ICON => ICON_SVG do |t|
  svg_icon(t.source).resize(152, 152).write t.name
end


task :default => Dir.glob('**/*.md').map{ |filename| filename.ext '.html' } +
                 ['style.css', TOUCH_ICON, FAVICON]


CLEAN.include Dir.glob(['**/*.html', '**/_history', '**/*.png', '**/*.ico',
                        ICON_SVG])
