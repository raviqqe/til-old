require 'map-rec'
require 'rake/clean'
require 'redcarpet'
require 'xml-dsl'



def markdown_to_html markdown
  Redcarpet::Markdown::new(Redcarpet::Render::HTML, fenced_code_blocks: true).render markdown
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


def get_title path
  path = dir_to_index(path) if File.directory?(path)
  File.open(path).to_a[0].sub(/^# */, '').strip
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


def dir_page markdown, filename
  Dir.chdir File.dirname(filename) do
    md_files = Dir.entries('.').select do |path|
      path !~ /^\.+$/ and not is_index_md(path) and path !~ /\.history\.md$/
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


HISTORY_DIR = '_history'

def in_history_dir path
  path =~ /(^|\/)#{HISTORY_DIR}/
end


GIT_LOG = "git log --date='format:%A, %B %d, %Y'"

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
        title_name = "raviqqe's notes"
        title(is_top_index_md(t.source) ? \
              title_name : get_title(t.source) + " | " + title_name)
        link rel: 'stylesheet', type: 'text/css', href: '/style.css'
        link href: '/favicon.ico', type: 'image/x-icon', rel: 'shortcut icon'
        link href: '/favicon.ico', type: 'image/x-icon', rel: 'icon'
        link href: '/apple-touch-icon.png', type: 'image/png', \
             rel: 'apple-touch-icon'
        meta name: 'viewport', content: 'width=device-width'
        base_dir = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0'
        link rel: 'stylesheet', href: "#{base_dir}/styles/default.min.css"
        script src: "#{base_dir}/highlight.min.js"
        script 'hljs.initHighlightingOnLoad();'

        style %(
          body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
          }

          .button {
            margin-right: 1em;
          }

          .date {
            margin-right: 0.5em;
          }

          img.logo {
            height: 1em;
            margin-right: 0.5em;
            vertical-align: -0.15em;
          }

          @media only screen and (max-width: 480px) {
            body { padding: 1.5ex }
          }
        )
      end

      body class: 'markdown-body' do
        div do
          p_ do
            a 'top', href: '/', class: 'button'
            a('back', href: (is_index_md(t.source) ? '..' : '.')) \
                unless is_top_index_md(t.source)
          end
        end

        hr

        markdown = File.read t.source
        markdown = markdown.gsub(
            /^# /, '# <img src="/icon.svg" alt="logo" class="logo"/>') \
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
                a 'History', href: File.join(HISTORY_DIR,
                                             File.basename(t.name))
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

    mkdir history_dir unless Dir.exist? history_dir
    File.write md_history_file, "# History of #{t.source}\n\n#{history}"
    Rake::Task[md_history_file.ext 'html'].invoke
  end

  File.write t.name, str
end


file 'style.css' do |t|
  sh "curl https://raw.githubusercontent.com/sindresorhus/github-markdown-css/gh-pages/github-markdown.css > #{t.name}"
end


task :default => Dir.glob('**/*.md').map{ |filename| filename.ext '.html' } \
                 .push('style.css')


CLEAN.include Dir.glob(['**/*.html', '**/_history'])
