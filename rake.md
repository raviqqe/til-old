# Rake

## Tasks can be nested

```
task :default => [:foo, :baz]

task :foo do
  task :bar do
    puts "bar"
  end
  puts "foo"
end

task :baz => :bar do
  puts "baz"
end
```

## Overwriting tasks

```
task :foo do
  puts "foo"
end

Rake::Task[:foo].clear
task :foo do
  puts "bar"
end
```

## Cleaning chains

```
%i(clean clobber).each do |task_name|
  Rake::Task[task_name].enhance do
    sh %(cd #{SUB_RAKE_DIR} && rake #{task_name})
  end
end
```
